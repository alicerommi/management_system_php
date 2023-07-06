<?php
require 'vendor/autoload.php';
//$access_token = getenv('sandbox_YLmQoGwup6JjQHHgK7Adi5BQhKjPSakoxwfMY75I');
$client = new \GoCardlessPro\Client([
    // We recommend storing your access token in an
    // environment variable for security, but you could
    // include it as a string directly in your code
    'access_token' => 'sandbox_YLmQoGwup6JjQHHgK7Adi5BQhKjPSakoxwfMY75I',
    // Change me to LIVE when you're ready to go live
    'environment' => \GoCardlessPro\Environment::SANDBOX
]);
// $customers = $client->customers()->list()->records;
// print_r($customers);
#---------step 1
//for putting the info of client using the shown link 
// $redirectFlow = $client->redirectFlows()->create([
//     "params" => [
//         // This will be shown on the payment pages
//         "description" => "Wine boxes",
//         // Not the access token
//         "session_token" => "dummy_session_token",
//         "success_redirect_url" => "https://developer.gocardless.com/example-redirect-uri/",
//         // Optionally, prefill customer details on the payment page
//         "prefilled_customer" => [
//           "given_name" => "Tim",
//           "family_name" => "Rogers",
//           "email" => "tim@gocardless.com",
//           "address_line1" => "338-346 Goswell Road",
//           "city" => "London",
//           "postal_code" => "EC1V 7LQ"
//         ]
//     ]
// ]);

// Hold on to this ID - you'll need it when you
// "confirm" the redirect flow later

//print("ID: " . $redirectFlow->id . "<br />"); // RE0000YAVXCFB7NFRPXPX2ETV1BESYBR using this id we will get the customer info


//print("URL: " . $redirectFlow->redirect_url);

#----------------next step 2 

// $redirectFlow = $client->redirectFlows()->complete(
//     "RE0000YAVXCFB7NFRPXPX2ETV1BESYBR", //The redirect flow ID from above.
//     ["params" => ["session_token" => "dummy_session_token"]]
// );

//print("Mandate: " . $redirectFlow->links->mandate . "<br />");
// Save this mandate ID for the next section.
//print("Customer: " . $redirectFlow->links->customer . "<br />");

// Display a confirmation page to the customer, telling them their Direct Debit has been
// set up. You could build your own, or use ours, which shows all the relevant
// information and is translated into all the languages we support.
//print("Confirmation URL: " . $redirectFlow->confirmation_url . "<br />");


#---------all the information of the customer has been added

#---------------------next step 3

// $customers = $client->customers()->list()->records;
// print_r($customers);


#--- now charging the customer with subscribtion based payment

//creating the subscription of a customer

//get the mandates ids of customers
// print_r($client->customers()->get("CU0003CFKRN8Z4"));


//MD00037TQTG31N [mandate id of customer named tim]


// $client->mandates()->list([
//   "params" => ["customer" => "CU0003CFKRN8Z4"]
// ]);

// print_r($client->mandates()->list());


//for the monthly subscription of customer

// $subscription = $client->subscriptions()->create([
//   "params" => [
//       "amount" => 1500, // 15 GBP in pence
//       "currency" => "GBP",
//       "interval_unit" => "monthly",
//       "day_of_month" => "5",
//       "links" => [
//           "mandate" => "MD00037TQTG31N"
//                        // Mandate ID from the last section
//       ],
//       "metadata" => [
//           "subscription_number" => "ABC1234"
//       ]
//   ],
//   "headers" => [
//       "Idempotency-Key" => "random_subscription_specific_string"
//   ]
// ]);

// //Keep hold of this subscription ID - we'll use it in a minute.
// //It should look a bit like "SB00003GKMHFFY"
// print("ID: " . $subscription->id);

//subscription has been created successfully.... so id is SB0000DPFY4SBK




