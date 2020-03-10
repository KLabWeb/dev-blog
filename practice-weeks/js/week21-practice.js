$(document).ready(() => {
  //BASIC SELECTORS AND ATTRIBUTES
  $('.p-after').text('Text Changed');

  $('#second-form input[name="notes"]').val("Default notes added");

  $('#second-form :text').val('<p> text: ' + $('.p-after').text());

  $('.inner-color-box-bottom-after:odd').attr('hidden', 'true');

  $('.inner-color-box-bottom-after:even').html('<img src="assets/images/lainlines.gif" alt="jquery image" style="width: 100%; height: 100%; margin: auto">');


  //DOM TRAVERSAL & CSS
  $('.inner-color-box-after').css({'text-align':'center', 'color':'black'});

  $('#box-container-after').children().css('border', '5px solid #e05915');

  $('.color-box-after').parent().css('background-color', 'white');

  $('.color-box-after:last').siblings().css('background-color', '#cdd422');

  $('.color-box-after').eq(2).css('background-color', '#c2dde6');

  //FILTERING
  $('.color-box-after').slice(2, 4).text("TEXT ADDED HERE");
  $('.color-box-after').slice(2, 4).css({"color":"black", "text-align": "center"});

  $('#second-form input[name="date"]').focus(()=> {
    if(!$(this).is('h4')){
      $('#jquery-form-after').css({'border':'5px solid #cdd422', 'padding':'5px'});
      console.log('text');
    }
  });

  $('#second-form').find('input:text').css('transform', 'rotate(180deg)');

  $('#second-form input').not(":first, input:text").css('transform', 'rotate(20deg)');

  $('#second-form input').filter((node_index) => {
    return node_index == 3;
  }).css('opacity', '.5');

  $('#after .insert').text(`This paragraph is ${$('#after .insert').width()} px long. It's BG is ${$('#after .insert').css('background-color')}.`);

  //DOM MANIPULATION
  $('#after .replace').replaceWith("<div class='replace'><img src='assets/images/john.gif' alt='Titor jQuery img'><p>This &lt;div&gt;, &lt;p&gt;, and &lt;img&gt; have replaced a paragraph</p></div>");

  $('#after .replace').before('<p>This node inserted as html content passed in via before()</p>');
  $('#after .replace').after('<p>This node inserted as html content passed in via after()</p>');

  $('#after .replace').wrap('<div style="background: black; width: 100%;">This div added to wrap image with wrap()</div>');

  $('#after .replace').append('<p>This paragraph appended as a child to &lt;div&gt; via append(). Second image added via clone() on existing &lt;img&gt;. Made italic via wrapping text with wrapInner().</p>');

  $('#after .replace img').clone().insertAfter($('#after .replace img'));

  $('#after .replace p:last').wrapInner('<i></i>');

  $('#after .wrap-click').click(() => $('#after .event-div-mouse').wrap('<div style="border: 5px solid #cdd422; margin: 3px;"></div>'));

  //EVENT HANDLING
  $('#after .click-me').bind('click', ()=> $('#after .event-div .result').text("Text filled via bind() 'click' event type handling function."));
  $('#after .focus-me').focus(() => $('#after .event-div .result').text("Focused on focus button"));
  $('#after .focus-me').blur(() => $('#after .event-div .result').text("Focus removed from focus button"));
  $('#after .input-me').keypress(() => $('#after .event-div .result').text($('#after .input-me').val()));
  $('#after .cord-click').click(event => $('#after .cord-click').text(`Mouse at screen location x: ${event.screenX}px, y: ${event.screenY}px`));

  //ANIMATIONS
  $('#after .show').click(() => $('.replace img:last').toggle(1000));

  $('#after .fade').click(() => {
                                  const img = $('.replace img:first');
                                  Number(img.css('opacity')) === 1 ? img.fadeTo(1000, .3) : img.fadeTo(1000, 1);
                                });

  $('#after .slide').click(() => $('.replace').slideToggle(1000));

  $('#after .animate').click(event => {
    let offset = $('#after .event-div button:first').offset().left;
    let opac = $('#after .event-div button:first').css('opacity');

    if(offset >= $(document).width()-275){
        right_hit = true;
        left_hit = false;
    }
    else if(offset <= 20){
        right_hit = false;
        left_hit = true;
    }

    if(right_hit){
      offset = {left: `${offset - 200}px`, opacity: opac + .1};
    }
    else if(left_hit){
      offset = {left: `${offset + 200}px`, opacity: opac - .1};
    }

    $('#after .event-div button, #after .event-div input').animate(offset)
    });
});
