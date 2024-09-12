<?php 
return [
  'accepted' => ' :attribute має бути прийнято.',
  'active_url' => ' :attribute не є дійсною URL-адресою.',
  'after' => ' :attribute має бути датою після :date.',
  'after_or_equal' => ' :attribute має бути датою після або дорівнювати :date.',
  'alpha' => ' :attribute може містити лише літери.',
  'alpha_dash' => ' :attribute може містити лише літери, цифри та тире.',
  'alpha_num' => ' :attribute може містити лише літери та цифри.',
  'array' => ' :attribute має бути масивом.',
  'before' => ' :attribute має бути датою перед :date.',
  'before_or_equal' => ' :attribute має бути датою, що передує або дорівнює :date.',
  'accepted_if' => 'Поле :attribute має прийматися, якщо :other дорівнює :value.',
  'ascii' => 'Поле :attribute має містити лише однобайтові буквено-цифрові символи та символи.',
  'between' => [
    'numeric' => ' :attribute має бути між :min і :max.',
    'file' => ' :attribute має бути між :min і :max кілобайтами.',
    'string' => 'Символ :attribute має бути між символами :min і :max.',
    'array' => ' :attribute має містити від :min до :max елементів.',
  ],
  'boolean' => 'Поле :attribute має мати значення true або false.',
  'confirmed' => 'Підтвердження :attribute не збігається.',
  'date' => ' :attribute не є дійсною датою.',
  'date_format' => ' :attribute не відповідає формату :format.',
  'different' => ' :attribute і :other мають бути різними.',
  'digits' => ' :attribute має складатися з :digits цифр.',
  'digits_between' => ' :attribute має бути між :min і :max цифрами.',
  'dimensions' => ' :attribute має недійсні розміри зображення.',
  'distinct' => 'Поле :attribute має повторюване значення.',
  'email' => ' :attribute має бути дійсною електронною адресою.',
  'invalidEmail' => 'Будь ласка, введіть дійсну адресу електронної пошти.',
  'invalidEmailPassword' => 'Неправильна комбінація електронної пошти та пароля.',
  'exists' => 'Вибраний :attribute недійсний.',
  'file' => ' :attribute має бути файлом.',
  'filled' => 'Поле :attribute повинно мати значення.',
  'image' => ' :attribute має бути зображенням.',
  'in' => 'Вибраний :attribute недійсний.',
  'in_array' => 'Поле :attribute не існує в :other.',
  'integer' => ' :attribute має бути цілим числом.',
  'ip' => ' :attribute має бути дійсною IP-адресою.',
  'json' => ' :attribute має бути дійсним рядком JSON.',
  'current_password' => 'Пароль неправильний.',
  'date_equals' => 'Поле :attribute має бути датою, що дорівнює :date.',
  'decimal' => 'Поле :attribute має містити :decimal знаків після коми.',
  'declined' => 'Поле :attribute має бути відхилено.',
  'declined_if' => 'Поле :attribute має бути відхилено, коли :other дорівнює :value.',
  'doesnt_end_with' => 'Поле :attribute не має закінчуватися одним із таких значень: :values.',
  'doesnt_start_with' => 'Поле :attribute не має починатися з одного з наступного: :values.',
  'ends_with' => 'Поле :attribute має закінчуватися одним із таких значень: :values.',
  'enum' => 'Вибраний :attribute недійсний.',
  'gt' => [
    'array' => 'Поле :attribute має містити більше ніж :value елементів.',
    'file' => 'Поле :attribute має бути більшим за :value кілобайт.',
    'numeric' => 'Поле :attribute має бути більшим за :value.',
    'string' => 'Поле :attribute має містити більше ніж :value символів.',
  ],
  'gte' => [
    'array' => 'Поле :attribute має містити :value елементів або більше.',
    'file' => 'Поле :attribute має бути більше або дорівнювати :value кілобайтам.',
    'numeric' => 'Поле :attribute має бути більше або дорівнювати :value.',
    'string' => 'Поле :attribute має бути більше або дорівнювати :value символів.',
  ],
  'ipv4' => 'Поле :attribute має бути дійсною адресою IPv4.',
  'ipv6' => 'Поле :attribute має бути дійсною адресою IPv6.',
  'lowercase' => 'Поле :attribute має бути малим регістром.',
  'lt' => [
    'array' => 'Поле :attribute має містити менше ніж :value елементів.',
    'file' => 'Поле :attribute має бути менше :value кілобайтів.',
    'numeric' => 'Поле :attribute має бути меншим за :value.',
    'string' => 'Поле :attribute має містити менше ніж :value символів.',
  ],
  'lte' => [
    'array' => 'Поле :attribute не повинно містити більше :value елементів.',
    'file' => 'Поле :attribute має бути менше або дорівнювати :value кілобайтам.',
    'numeric' => 'Поле :attribute має бути менше або дорівнювати :value.',
    'string' => 'Поле :attribute має містити менше або дорівнювати :value символів.',
  ],
  'mac_address' => 'Поле :attribute має бути дійсною MAC-адресою.',
  'max' => [
    'numeric' => ' :attribute не може бути більшим за :max.',
    'file' => ' :attribute не може перевищувати :max кілобайт.',
    'string' => ' :attribute не може бути більшим за :max символів.',
    'array' => ' :attribute не може мати більше ніж :max елементів.',
  ],
  'max_digits' => 'Поле :attribute не повинно містити більше :max цифр.',
  'mimes' => ' :attribute має бути файлом типу: :values.',
  'mimetypes' => ' :attribute має бути файлом типу: :values.',
  'min' => [
    'numeric' => ' :attribute має бути не менше :min.',
    'file' => ' :attribute має бути не менше :min кілобайт.',
    'string' => ' :attribute має бути принаймні :min символів.',
    'array' => ' :attribute має мати принаймні :min елементів.',
  ],
  'not_in' => 'Вибраний :attribute недійсний.',
  'numeric' => ' :attribute має бути числом.',
  'present' => 'Поле :attribute повинно бути присутнім.',
  'regex' => 'Формат :attribute недійсний.',
  'required' => 'Поле :attribute є обов’язковим.',
  'required_if' => 'Поле :attribute є обов’язковим, якщо :other дорівнює :value.',
  'required_unless' => 'Поле :attribute є обов’язковим, якщо :other не знаходиться в :values.',
  'required_with' => 'Поле :attribute є обов’язковим, якщо присутній :values.',
  'required_with_all' => 'Поле :attribute є обов’язковим, якщо присутній :values.',
  'required_without' => 'Поле :attribute є обов’язковим, якщо :values немає.',
  'required_without_all' => 'Поле :attribute є обов’язковим, якщо немає жодного з :values.',
  'same' => ' :attribute і :other мають збігатися.',
  'min_digits' => 'Поле :attribute має містити принаймні :min цифри.',
  'missing' => 'Поле :attribute має бути відсутнім.',
  'missing_if' => 'Поле :attribute має бути відсутнім, якщо :other дорівнює :value.',
  'missing_unless' => 'Поле :attribute має бути відсутнім, якщо :other не є :value.',
  'missing_with' => 'Поле :attribute повинно бути відсутнім, якщо присутнє :values.',
  'missing_with_all' => 'Поле :attribute повинно бути відсутнім, якщо присутні :values.',
  'multiple_of' => 'Поле :attribute має бути кратним :value.',
  'not_regex' => 'Формат поля :attribute недійсний.',
  'password' => [
    'letters' => 'Поле :attribute має містити принаймні одну букву.',
    'mixed' => 'Поле :attribute має містити принаймні одну велику та одну малу літери.',
    'numbers' => 'Поле :attribute має містити принаймні одне число.',
    'symbols' => 'Поле :attribute має містити принаймні один символ.',
    'uncompromised' => 'Даний :attribute з\'явився в результаті витоку даних. Виберіть інший :attribute.',
  ],
  'prohibited' => 'Поле :attribute заборонено.',
  'prohibited_if' => 'Поле :attribute заборонено, якщо :other дорівнює :value.',
  'prohibited_unless' => 'Поле :attribute заборонено, якщо тільки :other не знаходиться в :values.',
  'prohibits' => 'Поле :attribute забороняє наявність :other.',
  'required_array_keys' => 'Поле :attribute має містити записи для: :values.',
  'required_if_accepted' => 'Поле :attribute є обов’язковим, якщо приймається :other.',
  'size' => [
    'numeric' => ' :attribute має бути :size.',
    'file' => ' :attribute має бути :size кілобайт.',
    'string' => 'Символ :attribute має бути :size.',
    'array' => ' :attribute має містити :size елементів.',
  ],
  'string' => ' :attribute має бути рядком.',
  'timezone' => ' :attribute має бути дійсною зоною.',
  'unique' => 'Х1 вже взято.',
  'uploaded' => 'Не вдалося завантажити :attribute.',
  'url' => 'Формат :attribute недійсний.',
  'email_domain' => ' :attribute має бути дійсним доменом, напр. gmail.com',
  'slack_webhook' => 'Формат вебхуку недійсний. Для отримання додаткової інформації відвідайте це',
  'not_custom_fields' => 'Ви не можете додати настроюване поле з цією міткою, оскільки ви не можете використовувати ту саму назву мітки для того самого модуля',
  'starts_with' => 'Поле :attribute має починатися з одного з наступного: :values.',
  'ulid' => 'Поле :attribute має бути дійсним ULID.',
  'uppercase' => 'Поле :attribute має бути великим.',
  'uuid' => 'Поле :attribute має бути дійсним UUID.',
  'custom' => [
    'attribute-name' => [
      'rule-name' => 'custom-message',
    ],
  ],
  'givenDataInvalid' => 'Надані дані були недійсними.',
  'attributes' => [
    'client_name' => 'ім\'я клієнта',
    'client_email' => 'електронна адреса клієнта',
    'website' => 'веб-сайт',
    'name' => 'назва',
    'email' => 'електронною поштою',
    'password' => 'пароль',
    'country' => 'країна',
    'mobile' => 'мобільний',
    'category_name' => 'назва категорії',
    'title' => 'назва',
    'details' => 'деталі',
    'user_id' => 'працівник',
    'category_id' => 'ідентифікатор категорії',
    'file' => 'файл',
    'contact_name' => 'Контактна Особа',
    'import_file' => 'файл імпорту',
    'remind_time' => 'нагадати час',
    'next_follow_up_date' => 'наступна дата спостереження',
    'employee_id' => 'ідентифікатор працівника',
    'department' => 'відділ',
    'designation' => 'позначення',
    'hourly_rate' => 'погодинна ставка',
    'joining_date' => 'дата приєднання',
    'last_date' => 'остання дата',
    'date_of_birth' => 'дата народження',
    'probation_end_date' => 'дата закінчення випробувального терміну',
    'notice_period_start_date' => 'дата початку періоду повідомлення',
    'notice_period_end_date' => 'дата закінчення періоду повідомлення',
    'internship_end_date' => 'дата закінчення інтернатури',
    'contract_end_date' => 'дата закінчення договору',
    'relationship' => 'відносини',
    'award' => 'премія',
    'given_to' => 'надано',
    'award_date' => 'дата нагородження',
    'multi_date' => 'кілька дат',
    'year' => 'рік',
    'month' => 'місяць',
    'office_start_time' => 'час початку офісу',
    'office_end_time' => 'час закінчення офісу',
    'shift_short_code' => 'зрушити короткий код',
    'color' => 'колір',
    'late_mark_duration' => 'тривалість пізньої позначки',
    'clockin_in_day' => 'годинник в день',
    'office_open_days' => 'дні відкритих дверей офісу',
    'clock_in_time' => 'годинник у часі',
    'clock_out_time' => 'час виходу',
    'working_from' => 'працює від',
    'clock_in_ip' => 'годинник в ip',
    'clock_out_ip' => 'годинник ip',
    'designation_name' => 'назва позначення',
    'team_name' => 'назва команди',
    'client_id' => 'ідентифікатор клієнта',
    'subject' => 'тема',
    'amount' => 'сума',
    'contract_type' => 'договірний тип',
    'start_date' => 'дата початку',
    'first_name' => 'ім\'я',
    'last_name' => 'прізвище',
    'signature' => 'підпис',
    'image' => 'зображення',
    'comment' => 'коментар',
    'project_name' => 'Назва проекту',
    'hours_allocated' => 'годин виділено',
    'deadline' => 'крайній термін',
    'project_budget' => 'бюджет проекту',
    'currency_id' => 'ідентифікатор валюти',
    'project_id' => 'ідентифікатор проекту',
    'milestone_title' => 'назва віхи',
    'summary' => 'резюме',
    'discussion_category' => 'категорія обговорення',
    'description' => 'опис',
    'priority' => 'пріоритет',
    'due_date' => 'термін виконання',
    'repeat_cycles' => 'повторні цикли',
    'dependent_task_id' => 'ідентифікатор залежного завдання',
    'estimate_hours' => 'оцінка годин',
    'estimate_minutes' => 'оцінка хвилин',
    'note' => 'Примітка',
    'memo' => 'записка',
    'start_time' => 'Час початку',
    'end_time' => 'час закінчення',
    'valid_till' => 'дійсний до',
    'sub_total' => 'проміжний підсумок',
    'total' => 'всього',
    'lead_id' => 'ідентифікатор потенційного клієнта',
    'estimate_number' => 'кошторисна кількість',
    'invoice_number' => 'номер накладної',
    'issue_date' => 'дата випуску',
    'shipping_address' => 'адреса доставки',
    'day_of_week' => 'день тижня',
    'day_of_month' => 'день місяця',
    'cn_number' => 'cn номер',
    'invoice_id' => 'ідентифікатор рахунку-фактури',
    'item_name' => 'назва виробу',
    'purchase_date' => 'Дата покупки',
    'price' => 'ціна',
    'billing_cycle' => 'платіжний цикл',
    'paid_on' => 'оплачено',
    'transaction_id' => 'ID транзакції',
    'downloadable_file' => 'файл для завантаження',
    'tax_name' => 'назва податку',
    'rate_percent' => 'процентна ставка',
    'status' => 'статус',
    'order_date' => 'дата замовлення',
    'ticket_subject' => 'предмет квитка',
    'ticket_description' => 'опис квитка',
    'message' => 'повідомлення',
    'type' => 'типу',
    'channel_name' => 'назва каналу',
    'event_name' => 'назва події',
    'all_employees' => 'всі працівники',
    'where' => 'де',
    'event_link' => 'посилання на подію',
    'heading' => 'заголовок',
    'category' => 'категорія',
    'company_name' => 'Назва компанії',
    'company_email' => 'електронна адреса компанії',
    'company_phone' => 'телефон компанії',
    'location' => 'Місцезнаходження',
    'address' => 'адресу',
    'allowed_file_types' => 'дозволені типи файлів',
    'allowed_file_size' => 'дозволений розмір файлу',
    'currency_name' => 'назва валюти',
    'currency_symbol' => 'символ валюти',
    'usd_price' => 'usd_price',
    'exchange_rate' => 'курс валюти',
    'currency_code' => 'валютний код',
    'invoice_prefix' => 'префікс рахунку-фактури',
    'estimate_prefix' => 'оцінити префікс',
    'credit_note_prefix' => 'префікс кредит-ноти',
    'template' => 'шаблон',
    'due_after' => 'дата після',
    'invoice_terms' => 'умови рахунку-фактури',
    'app_name' => 'назва програми',
    'code' => 'код',
    'search_keyword' => 'ключове слово пошуку',
    'reply_heading' => 'заголовок відповіді',
    'reply_text' => 'текст відповіді',
    'send_reminder' => 'відправити нагадування',
    'remind_to' => 'відправити нагадування',
    'remind_type' => 'тип нагадування',
    'radius' => 'радіус',
    'alert_after' => 'сповіщення після',
    'monthly_report_roles' => 'ролі щомісячного звіту',
    'type_name' => 'назву типу',
    'leave_number' => 'залишити номер',
    'monthly_limit' => 'місячний ліміт',
    'label' => 'етикетка',
    'required' => 'вимагається',
    'agent_name' => 'ім\'я агента',
    'primary_color' => 'основний колір',
    'language_name' => 'назва мови',
    'language_code' => 'код мови',
    'flag' => 'прапор',
    'additional_description' => 'додатковий опис',
    'consent_description' => 'опис згоди',
    'full_name' => 'повне ім\'я',
    'allow_email' => 'дозволити електронну пошту',
    'email_domain' => 'домен електронної пошти',
    'external_link' => 'зовнішнє посилання',
    'filename' => 'ім\'я файлу',
    'task_id' => 'ідентифікатор завдання',
    'group_name' => 'назва групи',
    'column_name' => 'назва стовпця',
    'label_color' => 'колір етикетки',
    'clientName' => 'ім\'я клієнта',
    'city' => 'місто',
    'state' => 'стан',
    'line1' => 'рядок1',
    'notetext' => 'текст примітки',
    'value' => 'значення',
    'admin_id' => 'ідентифікатор адміністратора',
    'reason' => 'причина',
    'leave_date' => 'дата відпустки',
    'duration' => 'тривалість',
    'leave_type_id' => 'залишити ідентифікатор типу',
    'occassion' => 'нагода',
    'date' => 'дата',
    'employee_shift_id' => 'код зміни працівника',
    'hour_of_day' => 'годину дня',
    'backup_after_days' => 'резервне копіювання через дні',
    'delete_backup_after_days' => 'видалити резервну копію через дні',
    'credit_note_id' => 'ідентифікатор кредитної ноти',
    'billing_frequency' => 'періодичність виставлення рахунків',
    'billing_interval' => 'розрахунковий інтервал',
    'work_from_type' => 'твір від вид',
    'label_name' => 'назва мітки',
    'has_heading' => 'має заголовок',
    'notAllowed' => ' :attribute заборонено',
    'effective_after' => 'Діє після',
  ],
  'selectAtLeastOne' => 'Виберіть хоча б одну',
];