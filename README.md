# Path-Remapping-Strategy
CodeIgniter Path Remapping Strategy

This task requires you to create a path remapping strategy so that in result one application serves three different domains with different contents and functionality.
The application has to have a table in the database where it logs the names of all domains it was accessed from and counts how many times it was accessed from each. It should also log all the uri elements, their position in the link and count how many times they were repeated on that position.
Logging example: When user opens www.testsite.loc/uri1/uri2. The system should add “www.testsite.loc” to the domains table (if it doesn’t exist) and add both "uri1" and "uri2" to the uri requests log table (for uri1 note position 1, and uri2 position 2), both with the ID of the domain they appeared at. If uri1 is repeated on a different position (e.g. www.testsite.loc/sth/else/uri1) it has to be inserted into database again, but with position = 3.
This is what the domains should display when accessed from the browser (no real HTML syntax required):
www.testsite.loc – This site should just output the URI elements: "Your link contains: $uri[0], $uri[1], …, and $uri[n]".
www.adminsite.loc – On front page show a list of domains from the database. If the uri contains domain name that exists in the domains table (www.adminsite.loc/testsite.loc), then display the list/table of all uri requests made at that domain.
www.hashsite.loc – Take the first URI element (ignore anything else), hash it using the following pseudo code, and then display it:

hash = base64( md5( string ) + current timestamp );
hash = replace "+" with "-", "/" with "_", "=" with "" in hash;
