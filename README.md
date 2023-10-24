# Client Sempico SMS Api Library

## Requirements

- PHP with Curl Extension Support
- Sempico Account

## How to use
### Install with Composer
Recommended install via [composer](http://getcomposer.org)
```bash
composer require sempico/api-sms-php
```

#### Usage
```php
use Sempico\Api\Sms;

// Send sms
$result = Sms::send([
  'token'     => 'gbBX8dB7kDvBeo0H-VN2CX0bAXXbyJ',   // Token created in Web app, is required
  'phone'     => 12345678910,                        // Phone number in international format, is required
  'senderID'  => 41,                                 // ID of sender from which SMS will be send, is required
  'text'      => 'Hello world',                      // Content SMS for sending, is required
  'type'      => 'sms!',                             // Type of SMS or HLR or MNP
  'lifetime'  => 86400,                              // How many seconds will this SMS live
  'beginDate' => '2022-10-01',                       // Date when SMS should be send
  'beginTime' => '15:15:15',                         // Time when SMS should be send in selected beginDate
  'delivery'  => 'TRUE'                              // Allow / disallow get DLR back
]); 

// Refactore SMS credentials
$result = Sms::refactore([
  'token'     => 'gbBX8dB7kDvBeo0H-VN2CX0bAXXbyJ',   // Token created in Web app, is required
  'phone'     => 12345678910,                        // Phone number in international format, is required
  'senderID'  => 41,                                 // ID of sender from which SMS will be send, is required
  'text'      => 'Hello world',                      // Content SMS for sending, is required
]); 
```
