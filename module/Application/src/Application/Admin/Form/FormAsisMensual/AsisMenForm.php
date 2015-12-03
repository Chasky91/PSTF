<?php 
namespace Application\Admin\Form\FormAsisMensual;

use Zend\Form\Form;

use Doctrine\Common\PersistenceObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Admin\Form\FormAsisMensual\AsisMenFieldset;

class AsisMenForm extends Form
{
	public function __construct(ObjectManager $em)
	{
		parent::__construct('asismen-form');

		$this->setHydrator(new DoctryneHydrator($em));

		$asisMenFielset = new AsisMenFieldset($em);
		$asisMenFielset->setUseAsBaseFieldSet(true);
		$this->add($asisMenFielset);

		

	}
}