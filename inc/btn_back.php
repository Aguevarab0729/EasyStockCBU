<p class="has-text-right pt-4 pb-4 mr-6">
	<a href="#" class="button is-link is-normal btn-back">
        <span class="icon">
            <i class="fas fa-arrow-left"></i>
        </span>
    </a>
</p>

<script type="text/javascript">
    let btn_back = document.querySelector(".btn-back");

    btn_back.addEventListener('click', function(e){
        e.preventDefault();
        window.history.back();
    });
</script>