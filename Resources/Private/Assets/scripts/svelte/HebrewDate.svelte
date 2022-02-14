<script>
  import { onMount } from "svelte";
  import { addMessages, _, init } from 'svelte-i18n';

  import enTranslations from '../locales/en.json'
  import deTranslations from '../locales/de.json'
  import frTranslations from '../locales/fr.json'
  import itTranslations from '../locales/it.json'

  import { format } from 'date-fns'
  import { fr, it, de, enUS } from 'date-fns/locale'

  import easydropdown from "easydropdown";
  import debounce from "../util/debounce";
  import {HebrewCalendar, HDate, Location, HebrewDateEvent} from '@hebcal/core';
  import '@hebcal/locales';

  const appRoot = document.querySelector('[data-module-hebrew-date]');
  const appLanguage = appRoot.dataset.language;

  let APIUrl = 'https://www.hebcal.com/converter?cfg=json';
  let promise = Promise.resolve([]);
  let data = [];
  let gregData = [];
  let todayData= [];
  let todayDate= '';
  let todayThora = []
  let isLoading = false;
  let dateLocales = {
    'de': de,
    'it': it,
    'fr': fr,
    'en': enUS
  }

  let gregDate = '';
  let gregDay = format(new Date(), 'dd');
  let gregMonth = format(new Date(), 'MM');
  let gregYear = format(new Date(), 'yyyy');

  let hebDate = '';
  let hebDay = '';
  let hebMonth = '';
  let hebYear = '';

  addMessages('en',enTranslations);
  addMessages('de',deTranslations);
  addMessages('fr',frTranslations);
  addMessages('it',itTranslations);
  init({
    fallbackLocale: 'de',
    initialLocale: appLanguage,
  });



  onMount(() => {
    const monthSelect = document.querySelector('#monthSelect');
    const dropdownGreg = easydropdown(monthSelect,{
      classNames: {
        root: 'c-form_select',
        rootOpen: 'is-open',
        rootOpenAbove: '-above',
        rootOpenBelow: '-below',
        rootDisabled: 'is-disabled',
        rootInvalid: 'is-invalid',
        rootFocused: 'is-focused',
        rootHasValue: 'has-value',
        rootNative: 'is-native',
        gradientTop: 'edd-gradient-top',
        gradientBottom: 'edd-gradient-bottom',
        head: 'c-form_selectHead',
        value: 'c-form_selectValue',
        arrow: 'edd-arrow',
        select: 'c-form_selectSelect',
        body: 'c-form_selectBody',
        bodyScrollable: 'is-scrollable',
        bodyAtTop: 'is-top',
        bodyAtBottom: 'is-bottom',
        itemsList: 'c-form_selectItemsList',
        group: 'c-form_selectGroup',
        groupDisabled: 'is-disabled',
        groupHasLabel: 'has-label',
        groupLabel: 'c-form_selectGroupLabel',
        option: 'c-form_selectOption',
        optionDisabled: 'is-disabled',
        optionFocused: 'is-focused',
        optionSelected: 'is-selected',
      },
      behavior: {
        showPlaceholderWhenOpen: true,
      },
      callbacks: {
        onSelect: (value) => {
          gregMonth = value;
          getDate();
        }
      }
    });

    const monthHebSelect = document.querySelector('#monthHebSelect');
    const dropdownHeb = easydropdown(monthHebSelect,{
      classNames: {
        root: 'c-form_select',
        rootOpen: 'is-open',
        rootOpenAbove: '-above',
        rootOpenBelow: '-below',
        rootDisabled: 'is-disabled',
        rootInvalid: 'is-invalid',
        rootFocused: 'is-focused',
        rootHasValue: 'has-value',
        rootNative: 'is-native',
        gradientTop: 'edd-gradient-top',
        gradientBottom: 'edd-gradient-bottom',
        head: 'c-form_selectHead',
        value: 'c-form_selectValue',
        arrow: 'edd-arrow',
        select: 'c-form_selectSelect',
        body: 'c-form_selectBody',
        bodyScrollable: 'is-scrollable',
        bodyAtTop: 'is-top',
        bodyAtBottom: 'is-bottom',
        itemsList: 'c-form_selectItemsList',
        group: 'c-form_selectGroup',
        groupDisabled: 'is-disabled',
        groupHasLabel: 'has-label',
        groupLabel: 'c-form_selectGroupLabel',
        option: 'c-form_selectOption',
        optionDisabled: 'is-disabled',
        optionFocused: 'is-focused',
        optionSelected: 'is-selected',
      },
      behavior: {
        showPlaceholderWhenOpen: true,
      },
      callbacks: {
        onSelect: (value) => {
          hebMonth = value;
          getGregDate();
        }
      }
    });

    getTodayDate();

    const date1 = new HDate(new Date())
    const event1 = new HebrewDateEvent(date1);


    const options = {
      //year: 2021,
      //isHebrewYear: false,
      candlelighting: true,
      location: Location.lookup('Berlin'),
      sedrot: true,
      omer: true,
      start: date1,
      end: date1,
      locale: appLanguage
    };
    const events = HebrewCalendar.calendar(options);

    for (const ev of events) {
      const hd = ev.getDate();
      const date = hd.greg();
    }

  });

  /**
   * Get Hebrew Date from Gregorian Date
   * @returns {Promise<void>}
   */
  async function getDate() {
    if (gregYear === "" || gregMonth === "" || gregDay === "") {
      return
    }
    //const reqQuery = APIUrl+'&gy='+gregYear+'&gm='+gregMonth+'&gd='+gregDay+'&g2h=1';
    const reqQuery = new HDate(new Date(gregYear,gregMonth,gregDay))
    isLoading = true;
    const options = {
      //year: 2021,
      //isHebrewYear: false,
      candlelighting: true,
      location: Location.lookup('Berlin'),
      sedrot: true,
      omer: true,
      start: reqQuery,
      end: reqQuery,
    };
    const events = await HebrewCalendar.calendar(options);
    //const res = await fetch(reqQuery);
    data = await events;
    hebDate = reqQuery;
    isLoading = false;
  }

  /**
   * Get Gregorian Date from Hebrew Date
   * @returns {Promise<void>}
   */
  async function getGregDate() {
    if (hebYear === "" || hebMonth === "" || hebDay === "") {
      return
    }
    const reqQuery = new HDate(hebDay,hebMonth,hebYear)
    isLoading = true;
    const options = {
      //year: 2021,
      isHebrewYear: false,
      candlelighting: true,
      location: Location.lookup('Berlin'),
      sedrot: true,
      omer: true,
      start: reqQuery,
      end: reqQuery,
    };
    const events = await HebrewCalendar.calendar(options);
    //const res = await fetch(reqQuery);
    gregData = await events;
    gregDate = reqQuery;
    isLoading = false;
  }

  /**
   * Get Today's Date in Hebrew Date
   * @returns {Promise<void>}
   */
  async function getTodayDate() {
    isLoading = true;
    const todayQuery = new HDate(new Date())
    const todayOptions = {
      //year: 2021,
      //isHebrewYear: false,
      candlelighting: false,
      location: Location.lookup('Berlin'),
      sedrot: true,
      omer: true,
      start: todayQuery,
      end: todayQuery,
    };
    const todayEvents = await HebrewCalendar.calendar(todayOptions);

    // Get next Saturdays Thora Reading
    const todayThoraReading = HebrewCalendar.calendar({
      //year: 2021,
      //isHebrewYear: false,
      candlelighting: false,
      location: Location.lookup('Berlin'),
      sedrot: true,
      omer: false,
      start: todayQuery.nearest(6),
      end: todayQuery.nearest(6),
    })


    todayData = await todayEvents;
    todayDate = await todayQuery;
    todayThora = await todayThoraReading;
    isLoading = false;
  }

  /*  function formatDate(d,m,y) {
      const dateString = y+'-'+m+'-'+d;
      let date = parse(dateString, 'yyyy-MM-dd', new Date());
      return date
    }*/
</script>

<div class="o-wysiwyg">
  {#if todayDate}
    <h4 class="c-heading -h3">{$_('today_date')}</h4>
    <div class="c-hebrewDate_conversionBox">
      <div class="c-hebrewDate_innerBox">
        <span class="c-hebrewDate_conversionDate || c-heading -h4">{ format(todayDate.greg(), 'PPPP', { locale: dateLocales[appLanguage] })} {$_('or')} {todayDate.render(appLanguage)}</span>
      </div>
    </div>
    {@html appRoot.querySelector('[data-hebrew-date=textTodayDate]').innerHTML }
    <div class="c-hebrewDate_conversionBox">
      <div class="c-hebrewDate_innerBox">
        <span class="c-hebrewDate_conversionDate || c-heading -h4">{todayDate.renderGematriya()}</span>
      </div>
    </div>
    {@html appRoot.querySelector('[data-hebrew-date=textTodayThora]').innerHTML }
    {#if todayThora.length > 0}
      {#each todayThora as thoraReading}
        <div class="c-hebrewDate_conversionBox">
          <div class="c-hebrewDate_innerBox">
            <span class="c-hebrewDate_conversionDate || c-heading -h4">{thoraReading.render()}</span>
          </div>
        </div>
      {/each}
    {/if}
    {@html appRoot.querySelector('[data-hebrew-date=textTodayInfo]').innerHTML }
  {/if}

  <div class="c-hebrewDate_convertHebrew">
    <form class="c-form -dateConverter || js-autosubmit" on:submit|preventDefault={getDate}>
      <h4 class="c-form_title || u-grid -col-full">{$_('greg_to_heb')}</h4>
      <div class='c-form_field -input -primary || u-grid -col-start-1 -col-end-4'>
        <label for='dayInput' class='c-form_label'>{$_('day')}</label>
        <input name='dayInput' id="dayInput" class='c-form_input -primary ' type="text" bind:value={gregDay} on:input={debounce(getDate,400)} pattern="\d*" maxlength="2">
      </div>
      <div class="c-form_field -select -primary">
        <label for="monthSelect" class="c-form_label">{$_('month')}</label>
        <select name='monthSelect' id='monthSelect' class='c-form_select || js-select'>
          {#each { length: 12 } as _, i }
            <option value="{ i }">{ dateLocales[appLanguage].localize.month(i, { width: 'wide' })}</option>
          {/each}
        </select>
      </div>
      <div class='c-form_field -input -primary || u-grid -col-start-4 -col-end-6'>
        <label for='yearInput' class='c-form_label'>{$_('year')}</label>
        <input name='yearInput' id="yearInput" class='c-form_input -primary' type="text"  bind:value={gregYear} on:input={debounce(getDate,400)} pattern="\d*" maxlength="4">
      </div>
      <div class="c-form_field">
        <input class="c-button -primary" type="submit" name="send" value="{$_('convert')}">
      </div>
    </form>
    {#if hebDate}
      <h5 class="c-heading -h5">{$_('date_jewish')}</h5>
      <div class="c-hebrewDate_conversionBox -inverted">
        <div class="c-hebrewDate_innerBox">
          <span class="c-hebrewDate_conversionDate || c-heading -h4">
            { format(hebDate.greg(), 'PPPP', { locale: dateLocales[appLanguage]})}  {$_('or')}  {hebDate.render(appLanguage)}
        </span>
        </div>
      </div>
      <h5 class="c-heading -h5">{$_('date_heb')}</h5>
      <div class="c-hebrewDate_conversionBox -inverted">
        <div class="c-hebrewDate_innerBox">
          <span class="c-hebrewDate_conversionDate || c-heading -h4">{hebDate.renderGematriya()}</span>
        </div>
      </div>
    {/if}
  </div>

  <div class="c-hebrewDate_convertGregorian">
    <form class="c-form -dateConverter || js-autosubmit" on:submit|preventDefault={getGregDate}>
      <h4 class="c-form_title || u-grid -col-full">{$_('heb_to_greg')}</h4>
      <div class='c-form_field -input -primary || u-grid -col-start-1 -col-end-4'>
        <label for='dayHebInput' class='c-form_label'>{$_('day')}</label>
        <input name='dayHebInput' id="dayHebInput" class='c-form_input -primary ' type="text" bind:value={hebDay} on:input={debounce(getGregDate,400)} pattern="\d*" maxlength="2">
      </div>
      <div class="c-form_field -select -primary">
        <label for="monthHebSelect" class="c-form_label">{$_('month')}</label>
        <select name='monthHebSelect' id='monthHebSelect' class='c-form_select || js-select'>
          {#each { length: 12 } as _, i }
            <option value="{ HDate.getMonthName(i+1, format(new Date(), 'yyyy')) }">{ HDate.getMonthName(i+1, format(new Date(), 'yyyy')) }</option>
          {/each}
        </select>
      </div>
      <div class='c-form_field -input -primary || u-grid -col-start-4 -col-end-6'>
        <label for='yearHebInput' class='c-form_label'>{$_('year')}</label>
        <input name='yearHebInput' id="yearHebInput" class='c-form_input -primary' type="text"  bind:value={hebYear} on:input={debounce(getGregDate,400)} pattern="\d*" maxlength="4">
      </div>
      <div class="c-form_field">
        <input class="c-button -primary" type="submit" name="send" value="{$_('convert')}">
      </div>
    </form>
    {#if gregDate}
      <h5 class="c-heading -h5">{$_('date_greg')}</h5>
        <div class="c-hebrewDate_conversionBox -inverted">
          <div class="c-hebrewDate_innerBox">
            <span class="c-hebrewDate_conversionDate || c-heading -h4">{gregDate.render(appLanguage)} {$_('or')} { format(gregDate.greg(), 'PPPP GGG', { locale: dateLocales[appLanguage]})}</span>
          </div>
      </div>
      <h5 class="c-heading -h5">{$_('date_heb')}</h5>
      <div class="c-hebrewDate_conversionBox -inverted">
        <div class="c-hebrewDate_innerBox">
          <span class="c-hebrewDate_conversionDate || c-heading -h4">{gregDate.renderGematriya()}</span>
        </div>
      </div>
    {/if}
  </div>

</div>

<style>

</style>