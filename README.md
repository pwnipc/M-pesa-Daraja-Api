## M-pesa Daraja Api  intergration using PHP
# Step 1.
Create an account at Safaricom Developer Portal -> https://developer.safaricom.co.ke/login-register
# Step 2.
Login at -> https://developer.safaricom.co.ke/login-register ,
//Create a (Customer To Business)C2B API , Generate a Consumer Key and a Consumer Secret
After login, click the “My APPs” link at the top left to create your first app, and then click on the “Add a new APP” button on your right
check the box that reads, “Mpesa sandbox for b2b, b2c and c2b apis” . Then assign your app any name e.g. Thrombosis and such
[image]

Then, click on the “Create APP” button.

Once your app is created, you need to click it under the heading, “These are your apps! Explore them!”
At the bottom left, you will see your consumer key and consumer secret. Just copy-paste those details somewhere on your computer – we will need them later.

[image]

# Step 3.
Create a Security Token to Safeguard Against Fake Transactions
you can come up with something like  $K4t13B3maL0mLcrackme
The password will be used as an authorization mechanism to secure your website’s call back URLs that Safaricom API will notify once you receive a payment on your Mpesa Till or Paybill number.

# Step 4.
Get a testing short code
The Safaricom developer portal allows you to generate a short code that you can use to test your integration of Mpesa to your website before moving to production.
While logged in on the Mpesa developer website, visit https://developer.safaricom.co.ke/test_credentials to get a  test short code.

# Step 5.
Create a Database Table to Store Mpesa Transactions
(you can just import the mobile_payments.sql [mobile_payments.sql](assets/mobile_payments.sql) file in the assets folder ) or create a table using PHPMyAdmin as follows
-Name the table as mobile_payments
-the table schema should look like this

```
Auto - Auto number

TransactionType Varchar 40

TransID  Varchar 40

TransTime Varchar 40

TransAmount double

BusinessShortCode Varchar 15

BillRefNumber Varchar 40

InvoiceNumber Varchar 40

ThirdPartyTransID Varchar 40

MSISDN Varchar 20

FirstName Varchar 60

MiddleName Varchar 60

LastName Varchar 60

OrgAccountBalance Double
```

# Step 6.
 Creating a Folder on your Website to Store The M-pesa codes
 Have a look at the code in the [Mpesa](Mpesa)  Folder
 
 # Step 7.
  Testing the Validation and Confirmation URLs Configurations
  [TO DO]
 
 # Step 8.
  Moving Mpesa API to Production
  [TO DO]
