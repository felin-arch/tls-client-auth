#!/bin/bash
echo "Generating CA cert"
openssl req -new -x509 -days 365 -keyout ca.key -out ca.crt -config ca.conf

echo "Generating server cert"
openssl req -new -keyout server.key -out server.csr -config server.conf
openssl x509 -req -in server.csr -CA ca.crt -CAkey ca.key -CAcreateserial -out server.crt -extfile server.conf -extensions extensions -sha256

echo "Generating client Joe's cert"
openssl req -new -keyout joe.key -out joe.csr -config joe.conf
openssl x509 -req -in joe.csr -CA ca.crt -CAkey ca.key -CAcreateserial -out joe.crt -extfile joe.conf -extensions extensions -sha256
openssl pkcs12 -export -clcerts -in joe.crt -inkey joe.key -out joe.p12 -password pass:joe

echo "Generating client Jane's cert"
openssl req -new -keyout jane.key -out jane.csr -config jane.conf
openssl x509 -req -in jane.csr -CA ca.crt -CAkey ca.key -CAcreateserial -out jane.crt -extfile jane.conf -extensions extensions -sha256
openssl pkcs12 -export -clcerts -in jane.crt -inkey jane.key -out jane.p12 -password pass:jane
