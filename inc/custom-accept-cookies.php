<?php
add_action('corppix_after_site_page_tag', function(){
	?>
	<style>
		.accept-cookie-box {
            z-index: 2000;
            position: fixed;
            bottom: 0;
            transform: translateY(100%);
            left: 0;
            width: 100%;
            padding: 20px 0;
            background-color: rgba(0, 0, 0, 0.7);
            mix-blend-mode: normal;
        }
            @media screen and (max-width:816px) {
                .accept-cookie-box {
                    padding-right: 30px;
                }
            }
            @media screen and (max-width:479px) {
                .accept-cookie-box {
                    padding-right: 0;
                }
            }

        .accept-cookie-box.opened {
            transform: translateY(0);
        }

		.accept-cookie-box__inner {
			display: flex;
			align-items: center;
			justify-content: center;
		}
            @media screen and (max-width:816px) {
                .accept-cookie-box__inner {
                    flex-wrap: wrap;
                }
            }

		.accept-cookie-box__text {
			color: #fff;
		}
            @media screen and (max-width:479px) {
                .accept-cookie-box__text {
                    font-size: 12px;
                    margin-bottom: 10px;
                }
            }
		.accept-cookie-box__accept-btn {
			max-width: 120px;
		}
            @media screen and (max-width:479px) {
                .accept-cookie-box__accept-btn {
                    height: 28px;
                    line-height: 1.1;
                    width: auto;
                    padding: 5px 10px;
                }
            }
		.accept-cookie-box__close-btn {
			position: absolute;
			right: 10px;
			top: 5px;
			z-index: 20;
			background: none;
			border: none;
            padding: 0;
		}
		.accept-cookie-box__close-btn svg {
			pointer-events: none;
            width: 15px;
            height: 15px;
		}
        body.accept-cookie-box-is-opened .chat-icon {
            bottom: 85px;
        }
	</style>
	<div class="accept-cookie-box js-accept-cookie-box">
		<div class="container">
			<div class="accept-cookie-box__inner">
				<div class="accept-cookie-box__text">
					<?php echo __('Мы используем cookies для максимального удобства пользователей. Находясь на нашем веб-сайте, Вы принимаете.'.'<a href="'.site_url('privacy-policy').'"> правила использования cookies</a>.'); ?>
				</div>
				<button class="accept-cookie-box__accept-btn btn bg-pink js-accept-cookie-btn"
				        data-role="accept-cookie">
					<?php echo __('Принять'); ?>
				</button>
			</div>
		</div>
		<button class="accept-cookie-box__close-btn js-close-accept-cookie-box-btn"
		        data-role="close-accept-cookie-box">
			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			     viewBox="0 0 492 492" style="enable-background:new 0 0 492 492;" xml:space="preserve">
				<g>
					<g>
						<path d="M300.188,246L484.14,62.04c5.06-5.064,7.852-11.82,7.86-19.024c0-7.208-2.792-13.972-7.86-19.028L468.02,7.872
							c-5.068-5.076-11.824-7.856-19.036-7.856c-7.2,0-13.956,2.78-19.024,7.856L246.008,191.82L62.048,7.872
							c-5.06-5.076-11.82-7.856-19.028-7.856c-7.2,0-13.96,2.78-19.02,7.856L7.872,23.988c-10.496,10.496-10.496,27.568,0,38.052
							L191.828,246L7.872,429.952c-5.064,5.072-7.852,11.828-7.852,19.032c0,7.204,2.788,13.96,7.852,19.028l16.124,16.116
							c5.06,5.072,11.824,7.856,19.02,7.856c7.208,0,13.968-2.784,19.028-7.856l183.96-183.952l183.952,183.952
							c5.068,5.072,11.824,7.856,19.024,7.856h0.008c7.204,0,13.96-2.784,19.028-7.856l16.12-16.116
							c5.06-5.064,7.852-11.824,7.852-19.028c0-7.204-2.792-13.96-7.852-19.028L300.188,246z"/>
					</g>
				</g>
				</svg>
		</button>
	</div>

	<script>
		const ACCEPT_COOKIE_BOX   = document.querySelector('.js-accept-cookie-box');
		const CHAT_ICON           = document.querySelector('.chat-icon');
		const ACCEPT_COOKIE_CHECK = localStorage.getItem('accept-cookie');

		if ( !ACCEPT_COOKIE_CHECK || +ACCEPT_COOKIE_CHECK !== 1 ) {
			(ACCEPT_COOKIE_BOX) && ACCEPT_COOKIE_BOX.classList.add('opened');
			document.body.classList.add('accept-cookie-box-is-opened');
		}

		document.body.addEventListener('click', function(event){
			const ROLE = event.target.dataset.role;
			if ( !ROLE ) return;

			switch ( ROLE ) {
				case 'accept-cookie':
					localStorage.setItem('accept-cookie', 1);
					(ACCEPT_COOKIE_BOX) && ACCEPT_COOKIE_BOX.classList.remove('opened');
					document.body.classList.remove('accept-cookie-box-is-opened');
					break;
				case 'close-accept-cookie-box':
					(ACCEPT_COOKIE_BOX) && ACCEPT_COOKIE_BOX.classList.remove('opened');
					document.body.classList.remove('accept-cookie-box-is-opened');
					break;
			}
		});
	</script>
	<?php
});
?>