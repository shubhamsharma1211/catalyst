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
class Google_Service_PeopleService_UpdateContactPhotoRequest extends \Beehive\Google_Collection
{
    protected $collection_key = 'sources';
    public $personFields;
    public $photoBytes;
    public $sources;
    public function setPersonFields($personFields)
    {
        $this->personFields = $personFields;
    }
    public function getPersonFields()
    {
        return $this->personFields;
    }
    public function setPhotoBytes($photoBytes)
    {
        $this->photoBytes = $photoBytes;
    }
    public function getPhotoBytes()
    {
        return $this->photoBytes;
    }
    public function setSources($sources)
    {
        $this->sources = $sources;
    }
    public function getSources()
    {
        return $this->sources;
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
\class_alias('Beehive\\Google_Service_PeopleService_UpdateContactPhotoRequest', 'Google_Service_PeopleService_UpdateContactPhotoRequest', \false);