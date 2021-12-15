<template>
	<notice-black
		link="https://wpmudev.com/black-friday/?coupon=BFP-2021&utm_source=ivt_pro&utm_medium=referral&utm_campaign=bf2021"
		:sourceLang="getConfig"
		@onCloseClick="dismiss"
		v-if="canShow"
	>
		<p>
			<strong>{{ $i18n.bf.bold }}</strong>
			{{ $i18n.bf.main }}
		</p>
		<p><small>{{ $i18n.bf.sub }}</small></p>
	</notice-black>
</template>

<script>
import {setOption} from '@/helpers/utils'
import {NoticeBlack} from '@wpmudev/shared-notifications-black-friday'

export default {
	name: 'BlackFridayNotice',

	components: {NoticeBlack},

	computed: {
		/**
		 * Get config options for Black Friday Notice.
		 *
		 * @since 1.8.8
		 * @see https://www.npmjs.com/package/@wpmudev/shared-notifications-black-friday
		 *
		 * @return {*}
		 */
		getConfig() {
			return {
				discount: this.$i18n.bf.discount,
				closeLabel: this.$i18n.bf.close,
				linkLabel: this.$i18n.bf.label,
			}
		},

		/**
		 * Check if we can show BF modal.
		 *
		 * @since 1.8.8
		 *
		 * @return {boolean}
		 */
		canShow() {
			return !!this.$vars.flags.show_bf
		},
	},

	methods: {
		/**
		 * Set the dismiss flag for the notice.
		 *
		 * @since 1.8.8
		 */
		dismiss() {
			// Set dismiss flag.
			setOption('dismiss_bf_notice', true)
			// Save settings.
			this.$store.dispatch('settings/saveOptions')
		}
	}
}
</script>
