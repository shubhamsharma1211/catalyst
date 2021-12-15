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
class Google_Service_AnalyticsReporting_PivotHeader extends \Beehive\Google_Collection
{
    protected $collection_key = 'pivotHeaderEntries';
    protected $pivotHeaderEntriesType = 'Google_Service_AnalyticsReporting_PivotHeaderEntry';
    protected $pivotHeaderEntriesDataType = 'array';
    public $totalPivotGroupsCount;
    /**
     * @param Google_Service_AnalyticsReporting_PivotHeaderEntry[]
     */
    public function setPivotHeaderEntries($pivotHeaderEntries)
    {
        $this->pivotHeaderEntries = $pivotHeaderEntries;
    }
    /**
     * @return Google_Service_AnalyticsReporting_PivotHeaderEntry[]
     */
    public function getPivotHeaderEntries()
    {
        return $this->pivotHeaderEntries;
    }
    public function setTotalPivotGroupsCount($totalPivotGroupsCount)
    {
        $this->totalPivotGroupsCount = $totalPivotGroupsCount;
    }
    public function getTotalPivotGroupsCount()
    {
        return $this->totalPivotGroupsCount;
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
\class_alias('Beehive\\Google_Service_AnalyticsReporting_PivotHeader', 'Google_Service_AnalyticsReporting_PivotHeader', \false);