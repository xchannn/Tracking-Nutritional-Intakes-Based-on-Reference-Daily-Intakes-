<style>
	body {
		font-size: 0.85rem;
	}
</style>
<div class="modal" id="jobModal" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">


			<div class="modal-header">
				<h4 class="modal-title">FOOD DETAILS</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12 col-md-12">
						<div class="row">
							<div class="col-xs-12 col-md-12">
								<label for="food_item">Food Item : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="food_item" required />
								<div class="text-left food_itemfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="energy">Energy (kcal):</label>
								<input type="number" class="form-control" id="energy" required />
								<div class="text-left energyfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="protein">Protein (g) :</label>
								<input type="text" class="form-control" id="protein" required />
								<div class="text-left proteinfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="fat">Fat (g) :</label>
								<input type="text" class="form-control" id="fat" required />
								<div class="text-left fatfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="carbohydrates">Carbohydrates (g) :</label>
								<input type="text" class="form-control" id="carbohydrates" required />
								<div class="text-left carbohydratesfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="calcium">Calcium (mg) :</label>
								<input type="text" class="form-control" id="calcium" required />
								<div class="text-left calciumfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="phosphorus">Phosphorus (mg) :</label>
								<input type="text" class="form-control" id="phosphorus" required />
								<div class="text-left phosphorusfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="iron">Iron (mg) :</label>
								<input type="text" class="form-control" id="iron" required />
								<div class="text-left ironfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="vitamina">Vitamin A (μg) :</label>
								<input type="text" class="form-control" id="vitamina" required />
								<div class="text-left vitaminafieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="thiamin">Thiamin (mg) :</label>
								<input type="text" class="form-control" id="thiamin" required />
								<div class="text-left thiaminfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="riboflavin">Riboflavin (mg) :</label>
								<input type="text" class="form-control" id="riboflavin" required />
								<div class="text-left riboflavinfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="niacin">Niacin (mg) :</label>
								<input type="text" class="form-control" id="niacin" required />
								<div class="text-left niacinfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="vitaminc">Vitamin C (mg) :</label>
								<input type="text" class="form-control" id="vitaminc" required />
								<div class="text-left vitamincfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
						</div>
					</div>
				</div>
				<div class="fetched-data row"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success add_food_modal" id="submit" style="background-color:#8fce00;"><i class="fa fa-plus fa-xs "> </i> ADD FOOD</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash fa-xs "> </i> CLOSE</button>
			</div>
		</div>
	</div>
</div>