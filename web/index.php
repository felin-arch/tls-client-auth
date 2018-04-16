<html>
  <head>
    <title>TLS Client Auth Sample</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.min.css" integrity="sha256-Ro/wP8uUi8LR71kwIdilf78atpu8bTEwrK5ZotZo+Zc=" crossorigin="anonymous" />
  </head>
  <body>
    <div class="container">
    <h1>TLS Client Auth Sample</h1>
    <h2>You are currently <?php
      echo isset($_SERVER['SSL_CLIENT_S_DN']) ?
        'authenticated as <b>' . $_SERVER['SSL_CLIENT_S_DN_CN'] . '</b>' :
        '<b>not authenticated</b>';
      ?></h2>
    <p>This application was designed to demo TLS Client Certificate authentication a.k.a mutual TLS authentication. Follow the steps below to try it out.</p>
    <ol>
      <li>You will need to download the <a href="/tls/ca.crt" target="_blank">CA certificate</a> and install it into your trust store. Portswigger has a <a href="https://support.portswigger.net/customer/portal/articles/1783075-installing-burp-s-ca-certificate-in-your-browser" target="_blank"> great guide</a> on how to do this. This is needed so the certificate is marked as trusted by your browser.
        <ol>
          <li>You may need to visit this <a href="https://localhost:8081/">site via HTTPS</a> to install the root certificate.</li>
        </ol>
      </li>
      <li>
        Download Joe's certificates. These are the files you will use to authenticate as Joe.
        <ol>
          <li><a href="/tls/joe.key" target="_blank">Joe's private key</a></li>
          <li><a href="/tls/joe.crt" target="_blank">Joe's certificate</a></li>
          <li><a href="/tls/joe.p12" target="_blank">Joe's p12 archive</a>, password: joe</li>
        </ol>
      </li>
      <li>
        Download Jane's certificates. These are the files you will use to authenticate as Jane.
        <ol>
          <li><a href="/tls/jane.key" target="_blank">Jane's private key</a></li>
          <li><a href="/tls/jane.crt" target="_blank">Jane's certificate</a></li>
          <li><a href="/tls/jane.p12" target="_blank">Jane's p12 archive</a>, password: jane</li>
        </ol>
      </li>
      <li>
        All generated files (certificates, keys, CSRs, p12 archives) are available <a href="/tls/">here</a>.
      </li>
      <li>
        Try out TLS client auth with <b>the browser</b>.
        <ol>
          <li>Install the p12 archive into your browser. Methods on how to do this vary between platforms. Start with double clicking the downloaded archive.</li>
          <li>Visit the <a href="https://localhost:8081/">HTTPS site</a> in <b>private browsing mode</b> and select your client certificate to authenticate. Private browsing is needed to avoid the cache of the TLS session.</li>
        </ol>
      </li>
      <li>
        Try out TLS client auth with <b>curl</b>.
        <pre><code>curl -v --key joe.key --cert joe.crt https://localhost:8081/
curl -v --key jane.key --cert jane.crt https://localhost:8081/</code></pre>
      </li>
    </ol>
  </div>
  </body>
</html>


