$( document ).ready(function() {
    $(".edition").click(function () 
    {
        $("#ligneAuteur"+this.id).hide();
        $("#inputAuteur"+this.id).show();
        
        $("#ligneTitre"+this.id).hide();
        $("#inputTitre"+this.id).show();
        
        $("#ligneDisponible"+this.id).hide();
        $("#inputDisponible"+this.id).show();

        $("#IDAModifier").val(this.id);
    });
    
    $(".inputText").keyup(function () 
    {
        if(!$(this).val())
        {
            $(".boutonAjouter").prop('disabled', true);
        }
        else
        {
            $(".boutonAjouter").prop('disabled', false);
        }
    });
    
    $(".inputTextModifier").keyup(function () 
    {
        if(!$(this).val())
        {
            $(".boutonModifier").prop('disabled', true);
        }
        else
        {
            $(".boutonModifier").prop('disabled', false);
        }
        
    });
});