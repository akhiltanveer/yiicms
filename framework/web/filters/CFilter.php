<?php
/**
 * CFilter class file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2010 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * CFilter is the base class for all filters.
 *
 * A filter can be applied before and after an action is executed.
 * It can modify the context that the action is to run or decorate the result that the
 * action generates.
 *
 * Override {@link preFilter()} to specify the filtering logic that should be applied
 * before the action, and {@link postFilter()} for filtering logic after the action.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id: CFilter.php 1678 2010-01-07 21:02:00Z qiang.xue $
 * @package system.web.filters
 * @since 1.0
 */
class CFilter extends CComponent implements IFilter
{
	/**
	 * Performs the filtering.
	 * The default implementation is to invoke {@link preFilter}
	 * and {@link postFilter} which are meant to be overridden
	 * child classes. If a child class needs to override this method,
	 * make sure it calls <code>$filterChain->run()</code>
	 * if the action should be executed.
	 * @param CFilterChain the filter chain that the filter is on.
	 */
	public function filter($filterChain)
	{
		if($this->preFilter($filterChain))
		{
			$filterChain->run();
			$this->postFilter($filterChain);
		}
	}

	/**
	 * Performs the pre-action filtering.
	 * @param CFilterChain the filter chain that the filter is on.
	 * @return boolean whether the filtering process should continue and the action
	 * should be executed.
	 */
	protected function preFilter($filterChain)
	{
		return true;
	}

	/**
	 * Performs the post-action filtering.
	 * @param CFilterChain the filter chain that the filter is on.
	 */
	protected function postFilter($filterChain)
	{
	}
}