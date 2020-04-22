<?php
include('includes/session.inc.php');
include('includes/env.inc.php');
include('includes/header.inc.php');
?>


    <h1 class="mt-5">Sticky footer with fixed navbar</h1>
    <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>main &gt; .container</code>.</p>
    <p>Back to <a href="{{ site.baseurl }}/docs/{{ site.docs_version }}/examples/sticky-footer/">the default sticky footer</a> minus the navbar.</p>
<?php
include("includes/footer.inc.php");
?>