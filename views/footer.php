<!-- FOOTER -->
<footer class="footer page-footer font-small footer-custom pt-2" id="main-footer">
    <div class="footer-copyright text-center py-2">
        <p>©<span id="date"></span> <a href="home.php">Giga Shop</a>. All Rights Reserved.</p>
    </div>

</footer>

<script>
    const dateToday = new Date().getFullYear();
    document.getElementById("date").innerHTML = dateToday;
</script>