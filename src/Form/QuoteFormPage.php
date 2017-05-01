<?php

namespace Drupal\limograde_quote\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Mail\MailManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Language\LanguageManagerInterface;

/**
 * @ingroup limograde_quote
 */
class QuoteFormPage extends FormBase {

  /**
   * @var \Drupal\Core\Mail\MailManagerInterface
   */
  protected $mailManager;

  /**
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * {@inheritdoc}
   */
  public function __construct(MailManagerInterface $mail_manager, LanguageManagerInterface $language_manager) {
    $this->mailManager = $mail_manager;
    $this->languageManager = $language_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('plugin.manager.mail'),
      $container->get('language_manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'quote';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['intro'] = array(
      '#markup' => t('<h1 class="page-header">Quote Request</h1><p>Use this form to send a message to an email address.</p>'),
    );
    $form['email'] = array(
      '#type' => 'textfield',
      '#title' => t('Email address'),
      '#required' => TRUE,
    );
    $form['message'] = array(
      '#type' => 'textarea',
      '#title' => t('Message'),
      '#required' => FALSE,
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Submit Request'),
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (!valid_email_address($form_state->getValue('email'))) {
      $form_state->setErrorByName('email', t('Please provide a valid email address.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $form_values = $form_state->getValues();
    $module = 'limograde_quote';
    $key = 'quote';

    // Specify 'to' and 'from'.
    $to = $form_values['email'];
    $from = $this->config('system.site')->get('mail');

    // Email params and fields.
    $params = $form_values;
    $language_code = $this->languageManager->getDefaultLanguage()->getId();
    $send_now = TRUE;

    // Send the mail.
    $result = $this->mailManager->mail($module, $key, $to, $language_code, $params, $from, $send_now);
    if ($result['result'] == TRUE) {
      drupal_set_message(t('Your request has been submitted.'));
    }
    else {
      drupal_set_message(t('There was a problem submitting your request.'), 'error');
    }
  }

}
