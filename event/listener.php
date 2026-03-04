<?php
/**
 *
 * Debug phpBB. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2022-forever, Dark❶
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace dark1\debug\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use phpbb\request\request;

/**
 * Debug phpBB Event listener.
 */
class listener implements EventSubscriberInterface
{
	/** @var request */
	protected $request;

	/**
	 * Constructor
	 *
	 * @param request	$request	Request Object
	 */
	public function __construct(request $request)
	{
		$this->request = $request;
	}

	/**
	 * Get Subscribed Events
	 *
	 * @access public
	 * @return array
	 */
	public static function getSubscribedEvents()
	{
		return ['core.common'	=> ['test_debug', 9999]];
	}

	/**
	 * A sample PHP event
	 *
	 * @access public
	 * @return void
	 */
	public function test_debug()
	{
		if ($this->request->is_set('test_debug'))
		{
			$handler = defined('PHPBB_MSG_HANDLER') ? PHPBB_MSG_HANDLER : 'msg_handler';
			$handler(E_WARNING, 'phpBB Debug Enabled. | Please remove "test_debug" parameter.', __FILE__, __LINE__);
		}
	}
}
