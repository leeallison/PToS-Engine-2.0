 $(".card-grid").flip({
          trigger: 'manual'
        });

        $(".flip-btn").click(function(){
          $(this).closest(".card-grid").flip(true);
        });

        $(".unflip-btn").click(function(){
          $(this).closest(".card-grid").flip(false);
        });
