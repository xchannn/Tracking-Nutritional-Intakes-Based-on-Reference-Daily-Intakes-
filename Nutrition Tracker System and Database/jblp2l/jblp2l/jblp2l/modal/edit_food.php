<style>
	body {
		font-size: 0.85rem;
	}
</style>
<div class="modal" id="updateFoodModal" tabindex="-1" role="basic" aria-hidden="true">
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
								<label for="editModalfood_item">Food Item : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="editFoodModalId" hidden />
								<input type="text" class="form-control" id="editModalfood_item" required />
								<div class="text-left food_itemfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="editModalenergy">Energy (kcal):</label>
								<input type="number" class="form-control" id="editModalenergy" required />
								<div class="text-left energyfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="editModalprotein">Protein (g) :</label>
								<input type="text" class="form-control" id="editModalprotein" required />
								<div class="text-left proteinfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="editModalfat">Fat (g) :</label>
								<input type="text" class="form-control" id="editModalfat" required />
								<div class="text-left fatfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="editModalcarbohydrates">Carbohydrates (g) :</label>
								<input type="text" class="form-control" id="editModalcarbohydrates" required />
								<div class="text-left carbohydratesfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="editModalcalcium">Calcium (mg) :</label>
								<input type="text" class="form-control" id="editModalcalcium" required />
								<div class="text-left calciumfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="editModalphosphorus">Phosphorus (mg) :</label>
								<input type="text" class="form-control" id="editModalphosphorus" required />
								<div class="text-left phosphorusfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="editModaliron">Iron (mg) :</label>
								<input type="text" class="form-control" id="editModaliron" required />
								<div class="text-left ironfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="editModalvitamina">Vitamin A (μg) :</label>
								<input type="text" class="form-control" id="editModalvitamina" required />
								<div class="text-left vitaminafieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="editModalthiamin">Thiamin (mg) :</label>
								<input type="text" class="form-control" id="editModalthiamin" required />
								<div class="text-left thiaminfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="editModalriboflavin">Riboflavin (mg) :</label>
								<input type="text" class="form-control" id="editModalriboflavin" required />
								<div class="text-left riboflavinfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="editModalniacin">Niacin (mg) :</label>
								<input type="text" class="form-control" id="editModalniacin" required />
								<div class="text-left niacinfieldvalidation" style="display:none;">
									<span style="color:red;">Field is required<span>
								</div><br />
							</div>
							<div class="col-xs-3 col-md-3">
								<label for="editModalvitaminc">Vitamin C (mg) :</label>
								<input type="text" class="form-control" id="editModalvitaminc" required />
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
				<button type="button" class="btn btn-success update_food_modal" id="submit" style="background-color:#8fce00;"><i class="fa fa-plus fa-xs "> </i> Update FOOD</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash fa-xs "> </i> CLOSE</button>
			</div>
		</div>
	</div>
</div>