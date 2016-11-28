import { ExpomediaCliPage } from './app.po';

describe('expomedia-cli App', function() {
  let page: ExpomediaCliPage;

  beforeEach(() => {
    page = new ExpomediaCliPage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('app works!');
  });
});
