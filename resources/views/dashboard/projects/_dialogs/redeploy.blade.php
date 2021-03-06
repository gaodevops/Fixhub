<div class="modal modal-default fade" id="redeploy">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i class="ion ion-ios-cloud-upload"></i> {{ trans('deployments.rollback_title') }}</h4>
            </div>
            <form class="form-horizontal" role="form" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="modal-body">

                    <div class="alert alert-warning">
                        <h4>{{ trans('deployments.caution') }}</h4>
                        <p>{{ trans('deployments.expert') }}</p>
                        <p>{{ trans('deployments.rollback_warning') }}</p>
                    </div>
                    <hr />
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="deployment_reason">{{ trans('deployments.reason') }}</label>
						<div class="col-sm-9">
							<textarea rows="10" id="deployment_reason" class="form-control" name="reason" placeholder="{{ trans('deployments.describe_reason') }}"></textarea>
						</div>
                    </div>
                    @if (count($optional))
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="command_servers">{{ trans('deployments.optional') }}</label>
						<div class="col-sm-9">
							<ul class="list-unstyled">
								@foreach ($optional as $command)
								<li>
									<div class="checkbox">
										<label for="deployment_command_{{ $command->id }}">
											<input type="checkbox" class="deployment-command" name="optional[]" id="deployment_command_{{ $command->id }}" value="{{ $command->id }}" @if ($command->default_on === true) checked @endif/> {{ $command->name }}
										</label>
									</div>
								</li>
								@endforeach
							</ul>
						</div>
                    </div>
                    @endif
                </div>

                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">{{ trans('projects.redeploy') }}</button>
                         <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('app.cancel') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
