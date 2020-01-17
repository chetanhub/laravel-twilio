laravel-twilio
===============
Laravel Twillio API Integration

<!-- [![Latest Stable Version](https://poser.pugx.org/aloha/twilio/v/stable.svg)](https://packagist.org/packages/twilioman/twilio) -->
[![Latest Unstable Version](https://poser.pugx.org/twilioman/twilio/v/unstable.svg)](https://packagist.org/packages/twilioman/twilio)
[![License](https://poser.pugx.org/twilioman/twilio/license.svg)](https://packagist.org/packages/twilioman/twilio)

## Installation

Begin by installing this package through Composer. Run this command from the Terminal:

```bash
composer require twilioman/twilio
```
If you're using Laravel 5.5+, this is all there is to do.

Should you still be on older versions of Laravel, the final steps for you are to add the service provider of the package and alias the package. To do this open your `config/app.php` file.

## Integration for older versions of Laravel (5.5 -)

To wire this up in your Laravel project, you need to add the service provider.
Open `app.php`, and add a new item to the providers array.

```php
'TwilioMan\LaravelTwilio\Provider\ServiceProvider',
```

There's a Facade class available for you, if you like. In your `app.php` config file add the following
line to the `aliases` array if you want to use a short class name:

```php
'Twilio' => 'TwilioMan\LaravelTwilio\Facade\Facade',
```

#### Facade

First, include the `Facade` class at the top of your file:

```php
use TwilioMan\LaravelTwilio\Twilio;
```

To send a message using the default entry from your `twilio` :

```php
Twilio::message($user->phone, $message);
```

### Usage

Creating a Twilio object.

```php
$twilio = new TwilioMan\LaravelTwilio\Twilio($accountId, $token, $fromNumber);
```

Sending a text message:

```php
$twilio->message('+18085551212', 'Pink Elephants and Happy Rainbows');
```


Access the configured `Twilio\Rest\Client` object:

```php
$sdk = $twilio->getTwilio();
```

You can also access this via the Facade as well:

```php
$sdk = Twilio::getTwilio();
```

##### Pass as many optional parameters as you want

If you want to pass on extra optional parameters to the `messages->sendMessage(...)` method [from the Twilio SDK](https://www.twilio.com/docs/api/messaging/send-messages), you can do so
by adding to the `message` method. All arguments are passed on, and the `from` field is prepended from configuration.

```php
$twilio->message($to, $message, $mediaUrls, $params);
// passes all these arguments on.
```