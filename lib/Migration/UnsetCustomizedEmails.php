<?php
/**
 * @copyright Copyright (c) 2019 Guillaume COMPAGNON <gcompagnon@outlook.com>
 *
 * @author Guillaume COMPAGNON <gcompagnon@outlook.com>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\CustomizedEmails\Migration;

use OCA\CustomizedEmails\CustomizedEmails;
use OCP\IConfig;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;

class UnsetEmailTemplate implements IRepairStep {
	/** @var IConfig */
	protected $config;

	public function __construct(IConfig $config) {
		$this->config = $config;
	}

	public function getName() {
		return 'Reset the customized emails to default';
	}

	public function run(IOutput $output) {
		if ($this->config->getSystemValue('mail_template_class') === CustomizedEmails::class) {
			$this->config->deleteSystemValue('mail_template_class');
		}
	}
}
