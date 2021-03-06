<?php

namespace Beehive;

/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */
class Google_Service_AnalyticsReporting_ProductData extends \Beehive\Google_Model
{
    public $itemRevenue;
    public $productName;
    public $productQuantity;
    public $productSku;
    public function setItemRevenue($itemRevenue)
    {
        $this->itemRevenue = $itemRevenue;
    }
    public function getItemRevenue()
    {
        return $this->itemRevenue;
    }
    public function setProductName($productName)
    {
        $this->productName = $productName;
    }
    public function getProductName()
    {
        return $this->productName;
    }
    public function setProductQuantity($productQuantity)
    {
        $this->productQuantity = $productQuantity;
    }
    public function getProductQuantity()
    {
        return $this->productQuantity;
    }
    public function setProductSku($productSku)
    {
        $this->productSku = $productSku;
    }
    public function getProductSku()
    {
        return $this->productSku;
    }
}
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */
\class_alias('Beehive\\Google_Service_AnalyticsReporting_ProductData', 'Google_Service_AnalyticsReporting_ProductData', \false);