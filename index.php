<?php

require 'vendor/autoload.php';

use Assert\Assertion;

$payload = '{"data":[{"first_name":"matt","last_name":"stauffer","age":31,"email":"matt@stauffer.com","secret":"VXNlIHRoaXMgc2VjcmV0IHBocmFzZSBzb21ld2hlcmUgaW4geW91ciBjb2RlJ3MgY29tbWVudHM="},{"first_name":"dan","last_name":"sheetz","age":99,"email": "dan@sheetz.com","secret":"YWxidXF1ZXJxdWUuIHNub3JrZWwu"}]}';

/*
 * I should have returned a 400 for the JSON that you provided... :)
 */
Assertion::isJsonString($payload);

/*
 * Manipulate data
 */
$data = json_decode($payload, true)['data'] ?? [];

$emails = array_reduce($data, function ($emailArray, $person) {
    array_push($emailArray, $person['email'] ?? "");

    return $emailArray;
}, $initial = []);


/*
 * Finished Variables
 */

$emailCsv = implode(',', $emails);

$modifiedPersons = array_map(function ($person) {
    $person['name'] = sprintf("%s %s", $person['first_name'] ?? "", $person['last_name'] ?? "");

    return $person;
}, $data);

usort($modifiedPersons, function ($person1, $person2) {
    return $person2['age'] <=> $person1['age'];
});


dump($emailCsv);
dump($modifiedPersons);


/*
 * Assertions
 */

\Assert\that($emailCsv)->contains("matt@stauffer.com")->contains("dan@sheetz.com");
\Assert\that($modifiedPersons)->all()->keyExists('name');
Assertion::true($modifiedPersons[0]['age'] == 99);
Assertion::true($modifiedPersons[0]['name'] == 'dan sheetz');
Assertion::true($modifiedPersons[1]['name'] == 'matt stauffer');
