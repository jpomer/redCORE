<?php
/**
 * @package     Redcore.Library
 * @subpackage  Base
 *
 * @copyright   Copyright (C) 2012 - 2014 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */

defined('_JEXEC') or die;

/**
 * RedCore Route
 *
 * @package     RedCore
 * @subpackage  Base
 * @since       1.0
 */
class RRoute extends JRoute
{
	/**
	 * Optional custom route (from a redCORE compatible app)
	 *
	 * @var  object
	 */
	protected static $_customRouteClass = null;

	/**
	 * Sets a custom route class
	 *
	 * @param   string  $customRouteClass  The class corresponding to a redCORE based app
	 *
	 * @return  void
	 */
	public static function setCustomRoute($customRouteClass)
	{
		self::$_customRouteClass = $customRouteClass;
	}

	/**
	 * Translates an internal Joomla URL to a humanly readible URL.
	 *
	 * @param   string   $url    Absolute or Relative URI to Joomla resource.
	 * @param   boolean  $xhtml  Replace & by &amp; for XML compilance.
	 * @param   integer  $ssl    Secure state for the resolved URI.
	 *                             1: Make URI secure using global secure site URI.
	 *                             2: Make URI unsecure using the global unsecure site URI.
	 *
	 * @return  The translated humanly readible URL.
	 */
	public static function _($url, $xhtml = true, $ssl = null)
	{
		if (self::$_customRouteClass)
		{
			$customRouteClass = self::$_customRouteClass;

			return $customRouteClass::_($url, $xhtml, $ssl);
		}

		return parent::_($url, $xhtml, $ssl);
	}
}
