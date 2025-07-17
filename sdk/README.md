# Overview
Welcome to Tencent Cloud Software Development Kit (SDK), a companion tool for the TencentCloud API 3.0 platform.
Tencent Cloud SDK for PHP helps PHP developers debug and use TencentCloud APIs with ease. This document describes Tencent Cloud SDK for PHP and how to quickly use it with code samples provided.
# Dependent Environment
1. PHP 5.6.33 or higher
2. Activate your product in the Tencent Cloud Console
3. Get the `SecretID`, `SecretKey`, and `endpoint`. The general format of endpoint is `*.intl.tencentcloudapi.com`. For example, the `endpoint` of CVM is `cvm.intl.tencentcloudapi.com`. For more information, please see the documentation of the specified product.

# Installation
Before installing Tencent Cloud SDK for PHP and using TencentCloud API, you need to apply for security credentials in the Tencent Cloud Console, which consists of `SecretID` and `SecretKey`. `SecretID` is for identifying the API requester. `SecretKey` is a key used for signature string encryption and authentication by the server. Please keep your `SecretKey` private and do not disclose it to others.
## Installing via Composer
Installing via Composer is the recommended way to use the SDK for PHP. Composer is a dependency manager for PHP that supports the dependencies your project requires and installs them into your project. For more information, please visit Composer's official website.
1. Install Composer:
    For Windows, go to [Composer's official website](https://getcomposer.org/download/) to download the installation package and install composer.

    For Linux, install composer by running the following command on the command line.

    > curl -sS https://getcomposer.org/installer | php
2. Add dependencies to the `require` structure of `composer.json`. **Please note that the version number here is just an example, and you can view the latest version number in the Composer repository**:

    > "tencentcloud/tencentcloud-sdk-php-intl-en": "3.0.1"
3. Run the `composer install` command to download and install the SDK for PHP.
4. Add the following import code. For importing methods, please see the sample.

    > require 'vendor/autoload.php';

## Installing via Source Package
1. Go to [GitHub](https://github.com/tencentcloud/tencentcloud-sdk-php-intl-en) to clone the source code. Note: you must use the `git clone` method, as the source package directly download does not contain the required dependencies.
2. Decompress the package to an appropriate location in your project.
3. Add the following import code. For importing methods, please see the sample.

    > require_once '../TCloudAutoLoader.php';
# Sample
Take the API for querying availability zones as an example:
```php
<?php
require_once '../../../TCloudAutoLoader.php';
// Import the client of the corresponding product module
use TencentCloud\Cvm\V20170312\CvmClient;
// Import the `Request` class corresponding to the request API
use TencentCloud\Cvm\V20170312\Models\DescribeInstancesRequest;
use TencentCloud\Common\Exception\TencentCloudSDKException;
use TencentCloud\Common\Credential;
try {
    // Instantiate a certificate object. The Tencent Cloud account `secretId` and `secretKey` need to be passed in as input parameters
    $cred = new Credential("secretId", "secretKey");

    // # Instantiate the client object of the requested product (with CVM as an example)
    $client = new CvmClient($cred, "ap-guangzhou");

    // Instantiate a request object
    $req = new DescribeInstancesRequest();

    // Call the API you want to access through the client object. You need to pass in the request object
    $resp = $client->DescribeInstances($req);

    print_r($resp->toJsonString());
}
catch(TencentCloudSDKException $e) {
    echo $e;
}
```

## More Samples

You can find more detailed samples in the `examples` directory of the [GitHub](https://github.com/tencentcloud/tencentcloud-sdk-php-intl-en).

# Relevant Configuration

## Proxy

If there is a proxy in your environment, you need to set the system environment variable `https_proxy`; otherwise, it may not be called normally, and a connection timeout exception will be thrown.

## Certificate Issue

If there is a problem with your PHP environment certificate, errors similar to `cURL error 60: See http://curl.haxx.se/libcurl/c/libcurl-errors.html` may occur, which can be solved as follows:

1. Download the certificate file `cacert.pem` at [https://curl.haxx.se/ca/cacert.pem](https://curl.haxx.se/ca/cacert.pem) and save it to the PHP installation path.
2. Edit the `php.ini` file: delete the semicolon comment (;) before the `curl.cainfo` configuration item and set the value to the absolute path of the saved certificate file `cacert.pem`.
3. Restart the services that depend on PHP.

## php_curl Extension

GuzzleHttp, which this SDK depends on, needs to have the php_curl extension enabled. Check whether the php.ini environment in your environment is enabled. For example, on Linux with PHP 7.1, for services hosted under Apache, you can open `/etc/php/7.1/apache2/php.ini` to see whether the `extension=php_curl.dll` configuration item has been commented. Please delete the comment before it and restart Apache.

# Compliance Notice

Please prioritize using the ​default domain names configured in the SDK for each product. If using other domains, note that ​overseas domains may pose ​data compliance risks.
