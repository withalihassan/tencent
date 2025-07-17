<?php
/*
 * Copyright (c) 2017-2018 THL A29 Limited, a Tencent company. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace TencentCloud\Mps\V20190612\Models;
use TencentCloud\Common\AbstractModel;

/**
 * Image enhancement parameters
 *
 * @method SuperResolutionConfig getSuperResolution() Obtain Super-resolution configuration.

 * @method void setSuperResolution(SuperResolutionConfig $SuperResolution) Set Super-resolution configuration.

 * @method ColorEnhanceConfig getColorEnhance() Obtain Color enhancement configuration.

 * @method void setColorEnhance(ColorEnhanceConfig $ColorEnhance) Set Color enhancement configuration.

 * @method SharpEnhanceConfig getSharpEnhance() Obtain Detail enhancement configuration.

 * @method void setSharpEnhance(SharpEnhanceConfig $SharpEnhance) Set Detail enhancement configuration.

 * @method FaceEnhanceConfig getFaceEnhance() Obtain Face enhancement configuration.

 * @method void setFaceEnhance(FaceEnhanceConfig $FaceEnhance) Set Face enhancement configuration.
 */
class ImageEnhanceConfig extends AbstractModel
{
    /**
     * @var SuperResolutionConfig Super-resolution configuration.

     */
    public $SuperResolution;

    /**
     * @var ColorEnhanceConfig Color enhancement configuration.

     */
    public $ColorEnhance;

    /**
     * @var SharpEnhanceConfig Detail enhancement configuration.

     */
    public $SharpEnhance;

    /**
     * @var FaceEnhanceConfig Face enhancement configuration.

     */
    public $FaceEnhance;

    /**
     * @param SuperResolutionConfig $SuperResolution Super-resolution configuration.

     * @param ColorEnhanceConfig $ColorEnhance Color enhancement configuration.

     * @param SharpEnhanceConfig $SharpEnhance Detail enhancement configuration.

     * @param FaceEnhanceConfig $FaceEnhance Face enhancement configuration.
     */
    function __construct()
    {

    }

    /**
     * For internal only. DO NOT USE IT.
     */
    public function deserialize($param)
    {
        if ($param === null) {
            return;
        }
        if (array_key_exists("SuperResolution",$param) and $param["SuperResolution"] !== null) {
            $this->SuperResolution = new SuperResolutionConfig();
            $this->SuperResolution->deserialize($param["SuperResolution"]);
        }

        if (array_key_exists("ColorEnhance",$param) and $param["ColorEnhance"] !== null) {
            $this->ColorEnhance = new ColorEnhanceConfig();
            $this->ColorEnhance->deserialize($param["ColorEnhance"]);
        }

        if (array_key_exists("SharpEnhance",$param) and $param["SharpEnhance"] !== null) {
            $this->SharpEnhance = new SharpEnhanceConfig();
            $this->SharpEnhance->deserialize($param["SharpEnhance"]);
        }

        if (array_key_exists("FaceEnhance",$param) and $param["FaceEnhance"] !== null) {
            $this->FaceEnhance = new FaceEnhanceConfig();
            $this->FaceEnhance->deserialize($param["FaceEnhance"]);
        }
    }
}
