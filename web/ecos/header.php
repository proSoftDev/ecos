		<div class="container">
			<div class="row pt-3 text-center">
				<div class="col-sm-12 col-md">
						<a href="/index.php">
							<img  class="logo" src="images/logo.png" alt="logo">
						</a>
						<select name="lang-adaptive" class="lang-adaptive">
							<option value="Русский" selected>Русский</option>
							<option value="Английский">Английский</option>
							<option value="Казахский">Казахский</option>
						</select>
			
				</div>
				<div class="col-sm-12 col-md slct">
					<select name="lang" class="lang">
						<option value="Русский" selected>Русский</option>
						<option value="Английский">Английский</option>
						<option value="Казахский">Казахский</option>
					</select>
				</div>
				<div class="col-sm-12 col-md">
					<input class="search" type="search" placeholder="Поиск">
				</div>
				<div class="col-sm-6 col-md phone">
					<a class="number main-nav" href="tel:+7(727)356-33-56">7 (727) 356-33-56</a>
				</div>
				<div class="col-sm-6 col-md">
					<button type="button" class="order-a-call" data-toggle="modal" data-target="#exampleModal">
  						Написать письмо
					</button>
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="exampleModalLabel">Написать письмо</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form>
										<label for="uname" class="form-control-label">Ваше имя:</label>
										<input type="text" class="form-control" id="uname" required>
										<label for="uname" class="form-control-label">Ваш email:</label>
										<input type="email" class="form-control" id="uname" required>
										<label for="ucomment">Содержание письма</label>
										<textarea name="ucomment" class="form-control" id="ucomment" maxlength="5000"></textarea>
									</form>
								</div>
								<div class="modal-footer">
								    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
								    <button type="button" class="btn btn-primary">Отправить</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		