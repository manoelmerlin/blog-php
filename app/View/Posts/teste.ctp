<div id="escondido">
    <?php echo $this->Form->create('Admin'); ?>
    <?php echo $this->Form->input("nome"); ?>
    


</div>
<a href="" target="_blank" id="Clique">Clique aqui</a>


 <script>    $( "#Clique" ).click(function() {
  $("#escondido").css("display","block");
});;
</script> 

<style>
#escondido{
    display:none;
}
</style>