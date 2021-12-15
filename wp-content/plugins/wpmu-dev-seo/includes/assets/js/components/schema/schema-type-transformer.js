import schemaTypeProperties from "./schema-type-properties";
import update from "immutability-helper";
import {cloneDeep, merge} from "lodash-es";

export default class SchemaTypeTransformer {
	constructor() {
		this.callbacks = {};

		this.register('Article', (schema) => this.addCommentLoopToArticle(schema));
		this.register('Event', (schema) => this.addVirtualLocationToEvent(schema));
		this.register('Event', (schema) => this.addAggregateRatingAndReviewToEvent(schema));
		this.register('Product', (schema) => this.removeReviewAuthorOrganizationDataFromProduct(schema));
		this.register('WooProduct', (schema) => this.removeReviewAuthorOrganizationDataFromWooProduct(schema));
		this.register('FAQPage', (schema) => this.addCommentLoopToFaqPage(schema));
		this.register('HowTo', (schema) => this.addCommentToLoopToHowTo(schema));
		this.register('HowTo', (schema) => this.addAggregateRatingAndReviewToHowTo(schema));
	}

	register(type, transformingCallback) {
		if (!this.callbacks.hasOwnProperty(type)) {
			this.callbacks[type] = [];
		}

		this.callbacks[type].push(transformingCallback);
	}

	transformProperties(type, initial) {
		let transformed = initial;
		const callbacks = this.callbacks[type] || [];

		callbacks.forEach(callback => {
			transformed = callback(transformed);
		});

		return transformed;
	}

	/**
	 * Article in 2.9 didn't have a loop property for post comments. It was added in 2.10
	 */
	addCommentLoopToArticle(untransformed) {
		return this.addCommentLoopSchema(untransformed, schemaTypeProperties.Article);
	}

	/**
	 * Event type in version 2.9 didn't have virtual location but it was added in 2.10
	 */
	addVirtualLocationToEvent(untransformed) {
		if (untransformed?.location?.activeVersion) {
			// Virtual location already exists, no need for a transformation
			return untransformed;
		}

		const eventProperties = schemaTypeProperties['Event'];
		const newLocation = merge({}, eventProperties.location, {properties: {Place: untransformed.location}});
		return update(untransformed, {
			"location": {$set: newLocation}
		});
	}

	/**
	 * Event type in version 2.10 didn't have aggregateRating and review but it was added in 2.11
	 */
	addAggregateRatingAndReviewToEvent(untransformed) {
		return this.addAggregateRatingAndReview(untransformed, schemaTypeProperties.Event);
	}

	/**
	 * HowTo type in version 2.10 didn't have aggregateRating and review but it was added in 2.11
	 */
	addAggregateRatingAndReviewToHowTo(untransformed) {
		return this.addAggregateRatingAndReview(untransformed, schemaTypeProperties.HowTo);
	}

	addAggregateRatingAndReview(untransformed, source) {
		if (!untransformed?.aggregateRating) {
			untransformed = update(
				untransformed,
				{
					aggregateRating: {
						$set: cloneDeep(source.aggregateRating)
					}
				}
			);
		}

		if (!untransformed?.review) {
			untransformed = update(
				untransformed,
				{
					review: {
						$set: cloneDeep(source.review)
					}
				}
			);
		}

		return untransformed;
	}

	makeReviewAuthorOrganizationDataRemovalSpec(reviewProperties) {
		const spec = {};
		Object.keys(reviewProperties).forEach((repeatableKey) => {
			const organizationData = reviewProperties[repeatableKey]?.properties?.author?.properties?.Organization?.properties;
			const unset = [];

			if (organizationData?.contactPoint) {
				unset.push('contactPoint');
			}

			if (organizationData?.address) {
				unset.push('address');
			}

			if (!unset.length) {
				return;
			}

			spec[repeatableKey] = this.formatSpec(
				['properties', 'author', 'properties', 'Organization', 'properties'],
				{$unset: unset}
			);
		});

		return spec;
	}

	/**
	 * In 2.9 the review author organization property used to have contactPoint and address which were removed later on
	 */
	removeReviewAuthorOrganizationDataFromProduct(untransformed) {
		const reviewProperties = untransformed?.review?.properties;
		if (!reviewProperties) {
			return untransformed;
		}

		const spec = this.makeReviewAuthorOrganizationDataRemovalSpec(reviewProperties);
		if (!Object.keys(spec).length) {
			// Nothing to do
			return untransformed;
		}

		return update(untransformed, {"review": {"properties": spec}});
	}

	/**
	 * In 2.9 the review author organization property used to have contactPoint and address which were removed later on
	 */
	removeReviewAuthorOrganizationDataFromWooProduct(untransformed) {
		const reviewProperties = untransformed?.review?.properties?.Review?.properties;
		if (reviewProperties) {
			const reviewSpec = this.makeReviewAuthorOrganizationDataRemovalSpec(reviewProperties);
			if (Object.keys(reviewSpec).length) {
				untransformed = update(
					untransformed,
					this.formatSpec(["review", "properties", "Review", "properties"], reviewSpec)
				);
			}
		}

		const wooOrganizationData = untransformed?.review?.properties?.WooCommerceReviewLoop?.properties?.author?.properties?.Organization?.properties;
		const wooUnset = [];

		if (wooOrganizationData?.contactPoint) {
			wooUnset.push('contactPoint');
		}

		if (wooOrganizationData?.address) {
			wooUnset.push('address');
		}

		if (wooUnset.length) {
			untransformed = update(
				untransformed,
				this.formatSpec(["review", "properties", "WooCommerceReviewLoop", "properties", "author", "properties", "Organization", "properties"], {$unset: wooUnset})
			);
		}

		return untransformed;
	}

	formatSpec(keys, operation) {
		keys.slice().reverse().forEach(key => {
			operation = {[key]: operation};
		});

		return operation;
	}

	/**
	 *
	 */
	addCommentLoopToFaqPage(untransformed) {
		return this.addCommentLoopSchema(untransformed, schemaTypeProperties.FAQPage);
	}

	/**
	 *
	 */
	addCommentToLoopToHowTo(untransformed) {
		return this.addCommentLoopSchema(untransformed, schemaTypeProperties.HowTo);
	}

	addCommentLoopSchema(untransformed, source) {
		if (untransformed?.comment) {
			return untransformed;
		}

		return update(
			untransformed,
			{
				comment: {
					$set: cloneDeep(source.comment)
				}
			}
		);
	}
}
