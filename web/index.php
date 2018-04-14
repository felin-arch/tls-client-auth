<html>
  <head>
    <title>TlS Client Auth Sample</title>
  </head>
  <body>
    <h1>TLS Client Auth Sample</h1>
    <p>All generated files (certificates, keys, CSRs, p12 archives) are available <a href="/tls/">here</a></p>
    <p><a href="/tls/ca.crt">Here</a> is the CA root you need to install as trusted</p>
    <p>
      Jane's files
      <ul>
        <li><a href="/tls/jane.crt">certificate</a></li>
        <li><a href="/tls/jane.key">private key</a></li>
        <li><a href="/tls/jane.p12">p12 archive</a>, password: <i>jane</i></li>
      </ul>
    </p>
    <p>
      Joe's files
      <ul>
        <li><a href="/tls/joe.crt">certificate</a></li>
        <li><a href="/tls/joe.key">private key</a></li>
        <li><a href="/tls/joe.p12">p12 archive</a>, password: <i>joe</i></li>
      </ul>
    </p>
    <p>Once you downloaded all of the above, go and visit the <a href="https://localhost:8081/">HTTPS page</a> in <b>private broswing mode</b>!</p>
    <p>Or use <i>curl</i>
      <pre>curl -v --key joe.key --cert joe.crt https://localhost:8081/</pre>
      <pre>curl -v --key jane.key --cert jane.crt https://localhost:8081/</pre>
    </p>
    <br/>
    <h2>Here is the auth status of your current connection</h2>
    <p>
<?php
  if (isset($_SERVER['SSL_CLIENT_S_DN'])) {
    echo 'You are currently <b>authenticated as: <i>' . $_SERVER['SSL_CLIENT_S_DN'] . "</i></b>.";
  } else {
    echo 'You are currently <b>not authenticated</b>.';
  }
?>
  </p>
  </body>
</html>


