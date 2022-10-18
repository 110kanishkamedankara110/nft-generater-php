<input input type="number" place holder="no of nft" id="no" />
<button onclick="create();">Crate</button>
<div id="nft"></div>
<script>
    function create() {
        var t = document.getElementById("no").value;
       
        for (var i = 0; i < t; i++) {
window.open("rf.php","_blank","width=100px,height=100px")
        }
    }
</script>