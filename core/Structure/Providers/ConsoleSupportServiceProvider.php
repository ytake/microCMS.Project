<?php
namespace microCms\Providers;

use Illuminate\Foundation\Providers\ConsoleSupportServiceProvider as ConsoleProvider;

/**
 * Class ConsoleSupportServiceProvider
 * @package microCms\Providers
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class ConsoleSupportServiceProvider extends ConsoleProvider
{

	/**
	 * The provider class names.
	 *
	 * @var array
	 */
	protected $providers = [
		'Illuminate\Foundation\Providers\CommandCreatorServiceProvider',
		'Illuminate\Foundation\Providers\ComposerServiceProvider',
		'Illuminate\Foundation\Providers\KeyGeneratorServiceProvider',
		'Illuminate\Foundation\Providers\MaintenanceServiceProvider',
		'Illuminate\Foundation\Providers\OptimizeServiceProvider',
		'Illuminate\Foundation\Providers\RouteListServiceProvider',
		'Illuminate\Foundation\Providers\ServerServiceProvider',
		'Illuminate\Foundation\Providers\TinkerServiceProvider',
	];

}
