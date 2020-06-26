/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
/*( function() {
	var container, button, menu, links, i, len;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Close small menu when user clicks outside
	document.addEventListener( 'click', function( event ) {
		var isClickInside = container.contains( event.target );

		if ( ! isClickInside ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
		}
	} );

	// Get all the link elements within the menu.
	links = menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}*/
( function() {

	/* Move the Nav  on Scroll*/ 

	const container = document.querySelector( '.content-track' );

	function Annona_Main_Navigation( container ){
		this.toggle = document.querySelector( '.menu-toggle' );
		this.nav = document.querySelector( '.main-navigation' );
		this.container = container;
		this.wheelOpt = false;
		this.keys = {37: 1, 38: 1, 39: 1, 40: 1};

		this.handleScroll = function(){
			this.nav.style.top = window.scrollY + 'px';
		}

		this.keyDownCancelScroll = function( e, ele, keys ){
			if ( keys[e.keyCode] && ele.className.indexOf('menu-active') > 0 ){
				e.preventDefault();
			}
		}

		this.checkPassiveSupported = function(){
			let passiveSupport = false

			try {
				window.addEventListener( 'test' , null, {
					get passive(){
						passiveSupport = true
						return false;
					}
				})
			} catch ( error ){}

			return passiveSupport ? { passive : false } : false;
		}

		this.preventDefault = function(e){
			e.preventDefault();
		}

		this.disableScrolling = function(){
			window.addEventListener( 'wheel', this.preventDefault, this.wheelOpt);
			window.addEventListener( 'keydown', ( e ) => this.keyDownCancelScroll( e, this.container, this.keys ) );
			window.addEventListener( 'touchmove', this.preventDefault, false);
		}

		this.enableScrolling = function(){
			window.removeEventListener( 'wheel', this.preventDefault, this.wheelOpt);
			window.removeEventListener( 'keydown', ( e ) => this.keyDownCancelScroll( e, this.container, this.keys ) );
			window.removeEventListener( 'touchmove', this.preventDefault, false);
		}

		this.addListeners = function(){
			const handleScroll 	   = this.handleScroll.bind( this ),
				  enableScrolling  = this.enableScrolling.bind( this ),
				  disableScrolling = this.disableScrolling.bind( this ),
				  { container }	   = this;
			let cooldown, endScrollHandle;
			this.toggle.addEventListener('click', function(){
				if ( container.className.indexOf('menu-active') > 0 ){
					container.classList = container.className.replace(' menu-active','');
					enableScrolling();
				} else {
					container.className += ' menu-active';
					disableScrolling();
				}
			})

			window.addEventListener( 'scroll', function(){
				if ( cooldown ) return;
				cooldown = true;
				clearTimeout( endScrollHandle );
				handleScroll();
				setTimeout( function(){
					cooldown = false
				}, 150 )
				endScrollHandle = window.setTimeout( handleScroll, 200 );
			});
		}

		this.run = function(){
			this.wheelOpt = this.checkPassiveSupported();
			this.addListeners();
		}
	}

	const navFunctions = new Annona_Main_Navigation( container );
	navFunctions.run();

	function Annona_Parallax(){
		this.image = document.querySelector( '.parallax-image' );
		this.imageSection = document.querySelector( '.section-5' );

		this.addListeners = function(){
			const { image, imageSection } = this;
			window.addEventListener( 'scroll', function(){
				//let cooldownParallax = false;
				//if ( ! cooldownParallax ){
					cooldownParallax = true;
					let translation = .25 * window.scrollY - 400
					image.style.transform = 'translate3d( 0px, ' + translation + 'px, 0px)';
					//window.setTimeout(function(){ cooldownParallax = false },200)
				//}
			})
		}
	}

	const parallax = new Annona_Parallax();
	parallax.addListeners();

	/*function Annona_Skip_To_CTA(){
		this.skipButton = document.querySelector( '.skip-to-cta' );
		this.destination = document.querySelector( '#featured-secondary' );

		this.addListeners = function(){
			const { destination } = this;
			/*this.skipButton.addEventListener( 'click', function( e ){
				e.preventDefault();
				//console.log( this.destination );
				destination.scrollIntoView();

			});

		}

	}

	const annonaSkip = new Annona_Skip_To_CTA();
	annonaSkip.addListeners();*/


	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {
			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function() {
		var touchStartFn,
			parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode;

				if ( ! menuItem.classList.contains( 'focus' ) ) {
					e.preventDefault();
					for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
						if ( menuItem === menuItem.parentNode.children[i] ) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove( 'focus' );
					}
					menuItem.classList.add( 'focus' );
				} else {
					menuItem.classList.remove( 'focus' );
				}
			};

			for ( i = 0; i < parentLink.length; ++i ) {
				parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
			}
		}
	}( container ) );
}() );
