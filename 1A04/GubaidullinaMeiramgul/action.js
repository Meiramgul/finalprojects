$(document).ready(function(){
  var currentPosition = 0;
  var slideWidth = 580;
  var slides = $('.slide'); //slide-tardin massivi
  var numberOfSlides = slides.length;

  // Barlik .slide-tardy #slideInner div-imen svorachivaet
  slides.wrapAll('<div id="slideInner"></div>')
    // Float left gorizontal'no korsetu uwin
	.css({'float' : 'left'});
	
  // #slideInner enin jalpi barlik slide-tardin enine tenestiredi
  $('#slideInner').css('width', slideWidth * numberOfSlides);

  // DOM-ga control'dardi kosady
  $('#slideshow')
    .prepend('<span class="control" id="leftControl"></span>')
    .append('<span class="control" id="rightControl"></span>');

  // Sol jak control'di bastapkida jasirip turadi
  manageControls(currentPosition);

  // .control-dardy baskandagi jasalgan areketterdi tindaitin eventlistener jasaidy
  $('.control').click(function(){
    // Jana poziciyasin aniktaidy
	currentPosition = ($(this).attr('id')=='rightControl') ? currentPosition+1 : currentPosition-1;
    
	// Control'-dardy jasiradi jane korsetedi
    manageControls(currentPosition);
    // SlideInner-di margin-left koldanu arkili jiljitady
    $('#slideInner').animate({
      'marginLeft' : slideWidth*(-currentPosition)
    });
  });

  // manageControls: Kazirgi poziciyacina bailanisti control'dardy koesetedi jane jasiradi
  function manageControls(position){
    // eger birinwi slide bolsa sol jaktagi control-di jasiradi
	if(position==0){ $('#leftControl').hide(1000) } else{ $('#leftControl').show(1000) }
	// eger songi slide bolsa on jaktagi control-di jasiradi
    if(position==numberOfSlides-1){ $('#rightControl').hide(1000) } else{ $('#rightControl').show(1000) }
  }	
});
