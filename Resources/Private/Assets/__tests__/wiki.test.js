import { PlaywrightFluent, RequestInfo } from 'playwright-fluent';

describe('Wikipedia', () => {
  let p;
  /*
  beforeAll(async () => {
    jest.setTimeout(60000);
  });
*/
  beforeEach(() => {
    jest.setTimeout(60000);
    p = new PlaywrightFluent();
  });
  afterEach(async () => {
    await p.close({ timeoutInMilliseconds: 1000 });
  });

  test('test', async () => {
    const browser = 'chromium';
    const url = 'https://www.wikipedia.org';
    await p
      .withBrowser(browser)
      .withCursor()
      .navigateTo(url)
      .click('input[name="search"]')
      .typeText('religion')
      .click('text=Religion')
      .expectThatAsyncFunc(async () => await p.currentPage().url())
      .resolvesTo('https://en.wikipedia.org/wiki/Religion');
  });
});
