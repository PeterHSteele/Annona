/*
File featured.js.
Handles adding a fade-in effect to the site title and 
adding parallax behavior to an image in the featured template.
*/

function Annona_Parallax(){
	this.image = document.querySelector( '.parallax-image' );
	this.imageSection = document.getElementById( 'section-4' );
	this.width = document.getElementsByTagName( 'body' )[0].clientWidth
		
	this.handleTranslation = function( offset ){
		const imageSectionBoxY = this.imageSection.getBoundingClientRect().y
		let translation = imageSectionBoxY / -3 ; 
		this.image.style.transform = 'translate3d( 0px, ' + translation + 'px, 0px)';
	}
		
	this.addListeners = function( fn ){
		window.addEventListener( 'scroll', this.handleTranslation.bind(this) );
	}

	this.run = function(){
		this.handleTranslation();
		this.addListeners( this.handleTranslation );
	}
}

const annonaParallax = new Annona_Parallax();
annonaParallax.run();

function Annona_Title_Fade(){
	this.title = document.querySelector( '.site-title' )

	this.run = function(){
		if ( ! this.title ){
			return;
		}
		this.title.className+=' visible';
	}
}

const annonaTitleFade = new Annona_Title_Fade();
annonaTitleFade.run();