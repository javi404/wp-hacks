// this allows you to run wordpress as a different url than the public cloudfront cname url.
// add this cod to wp-options.php before the DB connection info.


// ******    cloudfront customization    ****** //
//  Is this CLOUDFRONT accessing me? //

if ($_SERVER['HTTP_USER_AGENT'] == 'Amazon CloudFront') {
        $_SERVER['HTTP_HOST'] = 'www.example.com';        // set to public domain
        $_SERVER['SERVER_NAME'] = $_SERVER['HTTP_HOST'];
        define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
        define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
        // $_SERVER['REQUEST_URI'] = str_replace('wordpress', 'home', $_SERVER['REQUEST_URI']);

        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {          //  Might as well get the real client IP while we are at it.
                $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
}
// ******    end customization    ****** //
