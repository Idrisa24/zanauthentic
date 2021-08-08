$('#printInvoice').click(function(){
    Popup($('.print-here')[0].outerHTML);
    function Popup(data) 
    {
        window.print();
        return true;
    }
});


