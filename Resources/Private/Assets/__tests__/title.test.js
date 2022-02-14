import { PlaywrightFluent, RequestInfo } from 'playwright-fluent';
const { chromium } = require('playwright');

describe('SIG Frontpage', () => {
  describe('Test for correct Title', () => {
    let p;

    beforeEach(async () => {
      jest.setTimeout(60000);
      const browser = await chromium.launch();
      const context = await browser.newContext({
        httpCredentials: {
          username: 'solitairedesign',
          password: '3Ez4v6q@',
        },
      });
      const page = await context.newPage();
      //await page.authenticate({ username: 'solitairedesign', password: '3Ez4v6q@' });
      //await page.goto('http://staging.swissjews.ch/');

      p = new PlaywrightFluent(browser, page);
    });
    afterEach(async () => {
      await p.close({ timeoutInMilliseconds: 1000 });
    });

    test('should be titled "Schweizerischer Israelitischer Gemeindebund (SIG)"', async () => {
      const url = 'http://staging.swissjews.ch';
      await p
        .withBrowser('chromium')
        .withCursor()
        .withOptions({ headless: false })
        .withExtraHttpHeaders({
          Authorization: 'Basic c29saXRhaXJlZGVzaWduOjNFejR2NnE=',
        })
        .navigateTo(url)
        .expectThatAsyncFunc(p.currentPage.title)
        .resolvesTo('Schweizerischer Israelitischer Gemeindebund (SIG)');

      /*    await expect(page.title()).resolves.toMatch(
      'Schweizerischer Israelitischer Gemeindebund (SIG)'
    );*/
    });
  });
});
