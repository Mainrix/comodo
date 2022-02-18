
 	<div id="modalRequest" class="modal ">
		<div class="modal__inner">
			<div class="modal__head">

				<div class="modal__title-wr  _small">

					<h3 class="modal__title">Оформить заявку</h3>

				</div>

				<button type="button" class="js-modal-close modal__close-btn btn _icon _white" data-type="sidebar">

					<svg class="icon-svg icon-svg_close btn__icon">
						<use xlink:href="/assets/images/sprite.svg#close"></use>
					</svg>

				</button>
			</div>
			<div class="modal__content">

				<form action="/bitrix/services/main/ajax.php?action=site:main.form.request" method="post" class="form js-request-form _stretch" id="formRequest">
                    <? bitrix_sessid_post() ?>
					<div class="form__subtitle text _c-light mb-24">
						<p class="">Наш менеджер свяжется с вами, чтобы обсудить детали и ответить на вопросы</p>
					</div>
					<div class="form__group">
						<label class="form-input  ">
							<input
								class="js-form-name _modal form-input__field js-placeholder-animate"
								autocomplete="on"
								type="text"
                                required
								name="name"
								placeholder="Имя"
								value=""
							>
						</label>
					</div>
					<div class="form__group">
						<label class="form-input  ">
							<input
								class="js-form-phone _modal form-input__field js-placeholder-animate"
								autocomplete="on"
								type="tel"
                                required
								name="phone"
								placeholder="Телефон*"
								value=""
							>
						</label>
					</div>
					<div class="form__group">
						<label class="form-input  ">
							<input
								class="js-form-email _modal form-input__field js-placeholder-animate"
								autocomplete="on"
								type="email"

								name="email"
								placeholder="Email"
								value=""
							>
						</label>
					</div>
					<div class="form__group">
						<label class="form-input _textarea ">
                            <textarea class="form-input__field js-form-text _modal" name="message"
									  placeholder="Сообщение"></textarea>
						</label>
					</div>
					<div class="form-footer _sticky mt-a">
						<button type="submit" class="btn _acsent _round _full btn-submit-js">
							<span class="btn__text">Отправить заявку</span>
						</button>
						<p class="form-politic mt-24">Нажимая кнопку «Отправить» вы подтверждаете согласие на обработку
							<a target="_blank" href="/privacy-policy/">персональных данных</a></p>
					</div>
				</form>

			</div>
		</div>
	</div>

<div class="hidden">
	<div id="modalQuiz" class="modal ">
		<div class="modal__inner">
			<div class="modal__head">
				<div class="modal__title-wr  _small">
					<h3 class="modal__title">Оформить анкету</h3>
				</div>
				<button type="button" class="js-modal-close modal__close-btn btn _icon _white" data-type="sidebar">
					<svg class="icon-svg icon-svg_close btn__icon">
						<use xlink:href="/assets/images/sprite.svg#close"></use>
					</svg>
				</button>
			</div>
			<div class="modal__content">
				<form   action="/bitrix/services/main/ajax.php?action=site:main.form.quiz" method="post" class="form js-request-form _stretch" id="formQuiz">
					<? bitrix_sessid_post() ?>

                    <div class="form__subtitle text _c-light mb-24">
						<p class="">Всегда рады новым партнерам и выгодным предложениям</p>
					</div>
					<div class="form__group">
						<label class="form-input  ">
							<input
								class="js-form-name _modal form-input__field js-placeholder-animate"
								autocomplete="on"
								type="text"
                                required


								name="name"
								placeholder="Имя"
								value=""
							>
						</label>
					</div>
					<div class="form__group">
						<label class="form-input  ">
							<input
								class="js-form-phone _modal form-input__field js-placeholder-animate"
								autocomplete="on"
								type="tel"
                                required
								name="phone"
								placeholder="Телефон*"
								value=""
							>
						</label>
					</div>
					<div class="form__group">
						<label class="form-input  ">
							<input
								class="js-form-email _modal form-input__field js-placeholder-animate"
								autocomplete="on"
								type="email"

								name="email"
								placeholder="Email"
								value=""
							>
						</label>
					</div>
					<div class="form__group">
						<label class="form-input  ">
						<input
								class="js-form-link _modal form-input__field js-placeholder-animate"
								autocomplete="on"
								type="text"
								name="link"
								placeholder="Сайт или Instagram"
								value=""
							>
						</label>
					</div>
					<div class="form-footer _sticky mt-a">
						<button type="submit" class="btn _acsent _round _full btn-submit-js">
							<span class="btn__text">Отправить анкету</span>
						</button>
						<p class="form-politic mt-24">Нажимая кнопку «Отправить» вы подтверждаете согласие на обработку
							<a target="_blank" href="/privacy-policy/">персональных данных</a></p>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

<div class="hidden">
	<div id="modalSuccess" class="modal _success">
		<div class="modal__inner">
			<div class="modal__head">
				<div class="modal__title-wr ">
					<h3 class="modal__title">Спасибо</h3>
				</div>
				<button type="button" class="js-modal-close modal__close-btn btn _icon _white" data-type="">
					<svg class="icon-svg icon-svg_close btn__icon">
						<use xlink:href="/assets/images/sprite.svg#close"></use>
					</svg>
				</button>
			</div>
			<div class="modal__content">
				<p class="modal__desc">
					заявка принята
				</p>
			</div>
		</div>
	</div>
</div>


<div class="toast-block" id="toast-success">
	<div class="toast-block__title">

		<svg class="icon-svg icon-svg_s icon-svg_s-close toast-block__close">
			<use xlink:href="/assets/images/sprite.svg#s-close"></use>
		</svg>

	</div>
	<div class="toast-block__title">Заявка отправлена</div>
	<p class="toast-block__text">Скоро наш менеджер свяжется с вами, чтобы обсудить детали</p>
</div>