Twilio Lead Scoring
===================

This is a basic example of how one would do lead scoring using Twilio. You'll want to modify it a bit in actual production.

This example works with the Twilio API, so you'll need an account and phone number at Twilio before you can get started. Twilio sells simple, pay as you go phone services, and you can sign up for a free account with $30 of free credits at [http://www.twilio.com](http://www.twilio.com).

Installation
============

Installation of this lead scoring example is as simple as uploading this folder to your web server and editing `include.php`.

After you've uploaded the folder and edited `include.php`, go to your [Twilio numbers page](https://www.twilio.com/user/account/phone-numbers/) and point the Voice URL of your desired phone number to `http://yourserver/lead-scoring/handle-incoming-call.php`

Running the Example
===================

Set the agent phone number in `include.php` to your friend's number and dial the Twilio phone number you configured during the installation step. Your call will be placed on hold while the agent (your friend) is dialed. Once the agent picks up, both of you will be on a call together.

To perform the scoring, execute `inject-gather.php` (this can be done by either browsing to the script in your web browser, or running it through some type of job set to run a predefined amount of time after a call has started).

When `inject-gather.php` is executed, you (the lead) will be placed on hold while the agent is asked to score you. If the agent presses 1, you'll be put back on the call with each other. If the agent presses any other number, the call will be ended.

License
=======

Copyright (C) 2011 Rahim Sonawalla ([rahim@twilio.com](mailto:rahim@twilio.com) / [@rahims](http://twitter.com/rahims)).

Released under the [MIT license](http://www.opensource.org/licenses/mit-license.php).
