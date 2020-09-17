/**
 * File navigation.js.
 * Handles toggling visibility of the main nav and scroll 
 * behavior when nav is open.
 */

	function Annona_Main_Navigation(){
		this.body = document.querySelector( 'body' );
		this.toggle = document.querySelector( '.menu-toggle' );
		this.nav = document.querySelector( '.main-navigation' );
		this.navLinks = this.nav.getElementsByTagName( 'a' );
		this.container = document.querySelector( '.content-track' );
		this.wheelOpt = false;
		this.keys = {37: 1, 38: 1, 39: 1, 40: 1};

		this.handleScroll = function(){
			this.nav.style.top = window.scrollY + 'px';
		}

		this.handleKeyPress = function( e ){
			if ( this.container.className.indexOf('menu-active') > 0 ){
				if ( this.keys[e.keyCode] ){
					e.preventDefault();
				} else if ( e.keyCode === 9 ){
					this.toggleNav();
				}
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

		this.toggleNav = function(){
			if ( this.container.className.indexOf('menu-active') > -1 ){
				this.container.classList = this.container.className.replace( ' menu-active', '' );
				this.enableScrolling();
			} else {
				this.container.className += ' menu-active';
				this.disableScrolling();
			}
		}

		this.openNav = function(){
			if ( this.container.className.indexOf('menu-active') < 0 ){
				this.container.className += ' menu-active';
				this.disableScrolling();
			}
		}

		this.disableScrolling = function(){
			
			this.boundHandleKeyPress = this.handleKeyPress.bind(this);
			window.addEventListener( 'wheel', this.preventDefault, this.wheelOpt);
			window.addEventListener( 'keydown', this.boundHandleKeyPress );
			window.addEventListener( 'touchmove', this.preventDefault, false);
			//ios
			document.addEventListener('touchmove', this.preventDefault, this.wheelOpt );
			

		}

		this.enableScrolling = function(){
			window.removeEventListener( 'wheel', this.preventDefault, this.wheelOpt);
			window.removeEventListener( 'keydown', this.boundHandleKeyPress );
			window.removeEventListener( 'touchmove', this.preventDefault, false);
			//ios
			document.removeEventListener('touchmove', this.preventDefault, this.wheelOpt );
		}

		this.addListeners = function(){
			const handleScroll 	   = this.handleScroll.bind( this );

			let cooldown, endScrollHandle;
			this.toggle.addEventListener( 'click' , this.toggleNav.bind( this ));

			this.boundOpenNav = this.openNav.bind(this)
			for ( let i = 0; i< this.navLinks.length; i++){
				this.navLinks[i].addEventListener( 'focus', this.boundOpenNav );
			}

			window.addEventListener( 'scroll', function(){
				if ( cooldown ) return;
				cooldown = true;
				clearTimeout( endScrollHandle );
				handleScroll();
				setTimeout( function(){
					cooldown = false;
				}, 150 )
				endScrollHandle = window.setTimeout( handleScroll, 200 );
			});
		}

		this.run = function(){
			this.wheelOpt = this.checkPassiveSupported();
			this.addListeners();
		}
	}

	const annonaNavFunctions = new Annona_Main_Navigation();
	annonaNavFunctions.run();
