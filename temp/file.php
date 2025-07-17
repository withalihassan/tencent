<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/sdk/TCloudAutoLoader.php';  // ← Adjust this path if needed

use TencentCloud\Sms\V20210111\SmsClient;
use TencentCloud\Sms\V20210111\Models\SendSmsRequest;
use TencentCloud\Common\Credential;

// Initialize credentials (use your SecretId/SecretKey)
$cred = new Credential("IKIDsdAXigRzLTP9i5FE0aw64pOksoYLvHRP", "oNiqwpUyGLCj4B5nIbhZDrKaeWKvxnRs");

// Instantiate the SMS client (choose your region, e.g. ap-guangzhou)
$client = new SmsClient($cred, "ap-guangzhou");

// Create a SendSms request and set its parameters
$req = new SendSmsRequest();
// $req->SmsSdkAppId = "YourSmsSdkAppId";    // e.g. Tencent SMS App ID
// $req->SignName     = "YourSignName";     // your SMS sign
// $req->TemplateId   = "YourTemplateId";   // your SMS template ID
$req->PhoneNumberSet = ["+998952640010"]; // target number in E.164 format

// Send the SMS
$resp = $client->SendSms($req);
print_r($resp->toJsonString());

?>