<?php
namespace AtonQodef\Modules\Shortcodes\Lib;

use AtonQodef\Modules\Shortcodes\Accordion\Accordion;
use AtonQodef\Modules\Shortcodes\AccordionTab\AccordionTab;
use AtonQodef\Modules\Shortcodes\Blockquote\Blockquote;
use AtonQodef\Modules\Shortcodes\BlogList\BlogList;
use AtonQodef\Modules\Shortcodes\Button\Button;
use AtonQodef\Modules\Shortcodes\CallToAction\CallToAction;
use AtonQodef\Modules\Shortcodes\Clients\Clients;
use AtonQodef\Modules\Shortcodes\Client\Client;
use AtonQodef\Modules\Shortcodes\Counter\Countdown;
use AtonQodef\Modules\Shortcodes\Counter\Counter;
use AtonQodef\Modules\Shortcodes\CustomFont\CustomFont;
use AtonQodef\Modules\Shortcodes\Dropcaps\Dropcaps;
use AtonQodef\Modules\Shortcodes\ElementsHolder\ElementsHolder;
use AtonQodef\Modules\Shortcodes\ElementsHolderItem\ElementsHolderItem;
use AtonQodef\Modules\Shortcodes\GoogleMap\GoogleMap;
use AtonQodef\Modules\Shortcodes\Highlight\Highlight;
use AtonQodef\Modules\Shortcodes\Icon\Icon;
use AtonQodef\Modules\Shortcodes\IconListItem\IconListItem;
use AtonQodef\Modules\Shortcodes\IconWithText\IconWithText;
use AtonQodef\Modules\Shortcodes\InteractiveBanner\InteractiveBanner;
use AtonQodef\Modules\Shortcodes\ImageGallery\ImageGallery;
use AtonQodef\Modules\Shortcodes\Message\Message;
use AtonQodef\Modules\Shortcodes\OrderedList\OrderedList;
use AtonQodef\Modules\Shortcodes\PieCharts\PieChartBasic\PieChartBasic;
use AtonQodef\Modules\Shortcodes\PieCharts\PieChartDoughnut\PieChartDoughnut;
use AtonQodef\Modules\Shortcodes\PieCharts\PieChartDoughnut\PieChartPie;
use AtonQodef\Modules\Shortcodes\PieCharts\PieChartWithIcon\PieChartWithIcon;
use AtonQodef\Modules\Shortcodes\PricingTables\PricingTables;
use AtonQodef\Modules\Shortcodes\PricingTable\PricingTable;
use AtonQodef\Modules\Shortcodes\ProgressBar\ProgressBar;
use AtonQodef\Modules\Shortcodes\Separator\Separator;
use AtonQodef\Modules\Shortcodes\SocialShare\SocialShare;
use AtonQodef\Modules\Shortcodes\Tabs\Tabs;
use AtonQodef\Modules\Shortcodes\Tab\Tab;
use AtonQodef\Modules\Shortcodes\Team\Team;
use AtonQodef\Modules\Shortcodes\UnorderedList\UnorderedList;
use AtonQodef\Modules\Shortcodes\VideoButton\VideoButton;
use AtonQodef\Modules\Shortcodes\NumberedProcess\NumberedProcess;
use AtonQodef\Modules\Shortcodes\ImageWithText\ImageWithText;
use AtonQodef\Modules\Shortcodes\Process\ProcessHolder;
use AtonQodef\Modules\Shortcodes\Process\ProcessItem;
use AtonQodef\Modules\Shortcodes\SvgSeparator\SvgSeparator;

/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader {
	/**
	 * @var private instance of current class
	 */
	private static $instance;
	/**
	 * @var array
	 */
	private $loadedShortcodes = array();

	/**
	 * Private constuct because of Singletone
	 */
	private function __construct() {}

	/**
	 * Private sleep because of Singletone
	 */
	private function __wakeup() {}

	/**
	 * Private clone because of Singletone
	 */
	private function __clone() {}

	/**
	 * Returns current instance of class
	 * @return ShortcodeLoader
	 */
	public static function getInstance() {
		if(self::$instance == null) {
			return new self;
		}

		return self::$instance;
	}

	/**
	 * Adds new shortcode. Object that it takes must implement ShortcodeInterface
	 * @param ShortcodeInterface $shortcode
	 */
	private function addShortcode(ShortcodeInterface $shortcode) {
		if(!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
			$this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
		}
	}

	/**
	 * Adds all shortcodes.
	 *
	 * @see ShortcodeLoader::addShortcode()
	 */

	private function addShortcodes() {
		$this->addShortcode(new Accordion());
		$this->addShortcode(new AccordionTab());
		$this->addShortcode(new Blockquote());
		$this->addShortcode(new BlogList());
		$this->addShortcode(new Button());
		$this->addShortcode(new CallToAction());
        $this->addShortcode(new Clients());
        $this->addShortcode(new Client());
		$this->addShortcode(new Counter());
		$this->addShortcode(new Countdown());
		$this->addShortcode(new CustomFont());
		$this->addShortcode(new Dropcaps());
		$this->addShortcode(new ElementsHolder());
		$this->addShortcode(new ElementsHolderItem());
		$this->addShortcode(new GoogleMap());
		$this->addShortcode(new Highlight());
		$this->addShortcode(new Icon());
		$this->addShortcode(new IconListItem());
		$this->addShortcode(new IconWithText());
        $this->addShortcode(new ImageGallery());
        $this->addShortcode(new ImageWithText());
        $this->addShortcode(new InteractiveBanner());
		$this->addShortcode(new Message());
		$this->addShortcode(new NumberedProcess());
		$this->addShortcode(new OrderedList());
        $this->addShortcode(new PieChartBasic());
        $this->addShortcode(new PieChartPie());
        $this->addShortcode(new PieChartDoughnut());
        $this->addShortcode(new PieChartWithIcon());
        $this->addShortcode(new PricingTables());
        $this->addShortcode(new PricingTable());
        $this->addShortcode(new ProcessHolder());
        $this->addShortcode(new ProcessItem());
        $this->addShortcode(new ProgressBar());
        $this->addShortcode(new Separator());
		$this->addShortcode(new SocialShare());
        $this->addShortcode(new SvgSeparator());
		$this->addShortcode(new Tabs());
		$this->addShortcode(new Tab());
		$this->addShortcode(new Team());
		$this->addShortcode(new UnorderedList());
		$this->addShortcode(new VideoButton());
	}
	/**
	 * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
	 * of each shortcode object
	 */
	public function load() {
		$this->addShortcodes();

		foreach ($this->loadedShortcodes as $shortcode) {
			add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
		}
	}
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();