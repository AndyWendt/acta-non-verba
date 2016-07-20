# Acta Non Verba

## Installation

**Requires PHP 7**

**Note:** I have included assertions as well as variables so that it is easier to validate.  They can be removed if you do 
not want them.  The assertion and dumping library require a composer installation.

 

## Comments

If I was going to consume an actual API response, I most likely would implement a more reusable system utilizing reverse 
entity transformers similar to what Fractal has for outbound payloads.  Everything is dependent on the size of the project and the needs of the 
 customer of course--as is the case here. 

Your provided JSON is invalid so I manually fixed it.  I could write something to automatically fix it but the use case for such a script would be 
outside of the normal consumption of an API response since it is invalid.  
  
Technically, your specs said to create "two" variables.  This script creates more than that for greater readability.  It can be refactored 
to "two" variables if that is an actual limit on the number of variables in the script. 

## Requirements

 Given the provided JSON, build a simple PHP script to import it.

 Your script should create two variables:

 - a comma-separated list of email addresses
 - the original data, sorted by age descending, with a new field on each record
   called "name" which is the first and last name joined.

Please deliver your code in either a GitHub Gist or some other sort of web-hosted code snippet platform.
 

## Output

```
"matt@stauffer.com,dan@sheetz.com"

array:2 [
  0 => array:6 [
    "first_name" => "dan"
    "last_name" => "sheetz"
    "age" => 99
    "email" => "dan@sheetz.com"
    "secret" => "YWxidXF1ZXJxdWUuIHNub3JrZWwu"
    "name" => "dan sheetz"
  ]
  1 => array:6 [
    "first_name" => "matt"
    "last_name" => "stauffer"
    "age" => 31
    "email" => "matt@stauffer.com"
    "secret" => "VXNlIHRoaXMgc2VjcmV0IHBocmFzZSBzb21ld2hlcmUgaW4geW91ciBjb2RlJ3MgY29tbWVudHM="
    "name" => "matt stauffer"
  ]
]
```
