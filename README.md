# tls-client-auth
This application was designed to demo TLS Client Certificate authentication a.k.a mutual TLS authentication.

## prerequisites
* Docker, Docker Compose get them here: `https://docs.docker.com/compose/install/`

## how to use
Fire up the container with a `docker-compose up`.
This generates the certificates and sets up apache.

Visit `http://localhost:8080/` and follow the instructions.

## check out the
If you need more answers, take a look at the code.

## wireshark dump
I also included a dump of a sample connection. You can find it in `tls-client-auth.pcap`
