# One Step Checkout for Magento

## Overview
Downloaded from http://codecanyon.net/item/responsive-one-step-checkout/8368932
NEEDS TO BE TESTED AND EVAL'D

### Installation 
Install using modgit: 
`modgit add mage-mod-osc-magedrive git@github.com:flintdigital/mage-mod-osc-magedrive.git`

### Upgrade
Notice that we've added 3 (June 08 16) modifications to the original code. If we upgrade the plugin, we must merge these changes and any other commits we might have not documented over here.

1. [Tweaking styles for payment method specific fields](https://github.com/flintdigital/mage-mod-osc-magedrive/commit/5e014f798d4fd7f36349aff724ff2da3c1d6fb2b)

2. [Fixing issue for international shipping methods at checkout](https://github.com/flintdigital/mage-mod-osc-magedrive/commit/a0b861a4eb4450ba309590d1c846bcaa0f512122)

3. [Removing old admin definition from etc/config.xml file](https://github.com/flintdigital/mage-mod-osc-magedrive/commit/801e7a040f3895788bc45da670f1f5ef99c28778)



### System Configuration Setting
1. **Enable One step Checkout** - Enable/Disable the One Page Checkout.
1. **Enable shipping to different address** Allow customer to shipping different address.
1. **Default Payment method** Set default payment method when checkout page load. 
1. **Default Shipping method** Set default shipping method when checkout page load.
1. **Default Country** Set default country when checkout page load.
1. **Default Region/State** Set default region when checkout page load.
1. **Default ZIP/Postal Code** set default zip/postal code when checkout page load.
1. **Default City** Set default city when checkout page load.
1. **Hide Section Shipping method if only one method is applicable**
1. **Checkout title** Set checkout title in heading.
1. **Checkout description** It display under checkout title.
1. **Enable Comment to order** Display comment text area for customer in checkout.
1. **Show newsletter checkbox** Display newsletter checkbox on checkout page.
1. **Newsletter checkbox checked by default** Select checkbox by default when page load.
1. **Enable Coupon** Display coupon apply section.

### Field position management
You can set fields position on checkout page.

###  Required Field management
You can set which fields are required on checkout page.

###  Auto Update sections
1. **Auto update Sections following changes in Address** Auto save address and update Sections
1. **Address fields trigger updating Sections** When any list of fields change, shipping and payments are reload.
1. **Reload Sections** 
1. **Enable updating payment method**

### Checkout Settings
1. **Show Login Link** It will display login link if user not logged in.
1. **Enable Registration** It will allow to resiter the user in checkout step.
1. **Allow Guest Checkout** It will allow user to checkout as guest.
####Terms and Conditions
1. **Show Terms and Conditions** Enable terms and condition option in checkout.
1. **Terms and Conditions Title** Set title for terms and conditions.
1. **Terms and Conditions Content** Set content for terms and conditions.
1. **Enable custom size** Allows to set popup size width and height.


####Admin Order notification
1. **Enable email notification** Allows to send order email notification to admin.
1. **Notification email template** Allows to set order notification email template.
1. **Emails receive Notification** Allows to set email receive by comma separater.


####Gift message configuration
1. **Enable Gift message** Allows to show gift message option in checkout.

